<?php
/**
 * Created by PhpStorm.
 * User: ernest
 * Date: 03/10/19
 * Time: 08:27 م
 */

class ComparableException extends Exception
{
    public function __construct($message,$code = 0,Exception $previous = null) {
        $message = __CLASS__." : ".$message;
        parent::__construct($message,$code,$previous);
    }
}