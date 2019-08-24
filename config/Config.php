<?php declare(strict_types = 1);

namespace FunwithelePHPant\Config;

class Config
{
	private static $exclusion_array = ['Config.php'];
	private static $config = [];

	private function __construct() {}

	private static function init(string $path = __DIR__): void
    {
		self::includeConfigFiles(self::getConfigFiles($path));
	}

	private static function getConfigFiles(string $path_to_config_files): array
    {
		$config_files = glob($path_to_config_files.DIRECTORY_SEPARATOR.'*.php');
		return $config_files = array_filter($config_files, function($value) {
			return !in_array(basename($value), self::$exclusion_array);
		});
	}

	private static function includeConfigFiles(array $config_files)
    {
		foreach ($config_files as $file) {
			$config_values = include $file; 
			if (is_array($config_values)) {
				self::$config = array_merge(self::$config, $config_values);
			}
		}
	}

	public static function get(string $key): ?string
    {
	    if (empty(self::$config)) {
	        self::init();
        }
		$keys = explode('.', $key);
	    $keys_iterator = (new \ArrayObject($keys))->getIterator();
		$value = self::$config;
		while ($keys_iterator->valid() && isset($value[$keys_iterator->current()])) {
            $value = $value[$keys_iterator->current()];
			$keys_iterator->next();
		}
		if (is_string($value)) {
			return $value;
		}
		return null;
	}

}