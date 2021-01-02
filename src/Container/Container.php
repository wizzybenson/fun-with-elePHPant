<?php


namespace FunwithelePHPant\Container;

use FunwithelePHPant\Container\Reference\ParameterReference;
use FunwithelePHPant\Container\Reference\ServiceReference;
use FunwithelePHPant\Exceptions\ContainerException;
use FunwithelePHPant\Exceptions\ParameterNotFoundException;
use FunwithelePHPant\Exceptions\ServiceNotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    private $services = [];
    private $parameters = [];
    private $serviceStore;

    /**
     * Container constructor.
     * @param array $services
     * @param array $parameters
     */
    public function __construct(array $services, array $parameters)
    {
        $this->services = $services;
        $this->parameters = $parameters;
        $this->serviceStore = [];
    }


    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return mixed Entry.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new ServiceNotFoundException('Service ' .$id. ' Not Found' );
        }

        if (!isset($this->serviceStore[$id])) {
            $this->serviceStore[$id] = $this->createService($id);
        }

        return $this->serviceStore[$id];
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        return isset($this->services[$id]);
    }

    private function createService(string $id)
    {
        $entry = &$this->services[$id];

        if (!is_array($entry) || !isset($entry['class'])) {
            throw new ContainerException($id .' service entry must be an array with a \'class\' key');
        } elseif (!class_exists($entry['class'])) {
            throw new ContainerException($entry['class'].' class does not exist');
        } elseif (isset($entry['lock'])) {
            throw new ContainerException($id.' has circular reference. In other words, it had been created before');
        }

        $entry['lock'] = true;

        $arguments = isset($entry['arguments']) ? $this->resolveArguments($id, $entry['arguments']) : [];
        $reflector = new \ReflectionClass($entry['class']);
        $service = $reflector->newInstanceArgs($arguments);
        
        if (isset($entry['calls'])) {
            $this->initializeService($service, $id, $entry['calls']);
        }
        
        return $service;

    }

    public function getParameter($id)
    {
        $context = $this->parameters;
        $tokens = explode('.', $id);

        while(null !== ($token = array_shift($tokens))) {
            if (!isset($context[$token])) {
                throw new ParameterNotFoundException('Parameter '.$id. ' Not Found');
            }

            $context = $context[$token];
        }

        return $context;
    }

    private function resolveArguments(string $id, array $argDefinitions)
    {
        $arguments = [];
        foreach ($argDefinitions as $argDefinition) {
            if ($argDefinition instanceof ServiceReference) {
                $arguments[] = $this->get($argDefinition->getId());
            } elseif ($argDefinition instanceof ParameterReference) {
                $arguments[] = $this->getParameter($argDefinition->getId());
            } else {
                $arguments[] = $argDefinition;
            }
        }

        return $arguments;
    }

    private function initializeService(object $service, string $id, array $callDefinitions)
    {
        foreach ($callDefinitions as $callDefinition) {
            if (!is_array($callDefinition) || !isset($callDefinition['method'])) {
                throw new ContainerException($id.' service calls must be array containing a \'method\' key');
            } elseif (!is_callable([$service, $callDefinition['method']])) {
                throw new ContainerException($id.' service method '.$callDefinition['method'].' is not callable');
            }

            $arguments = isset($callDefinition['arguments']) ? $this->resolveArguments($id, $callDefinition['arguments']) : [];

            call_user_func_array([$service, $callDefinition['method']],$arguments);
        }
    }
}