<?php

/**
 * Created by PhpStorm.
 * User: Anna
 * Date: 06.05.2018
 * Time: 11:07
 */
class RoutExeption extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
     echo "<script>location='error';</script>";
    }
}