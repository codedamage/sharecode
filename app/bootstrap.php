<?php
//Load config file
require_once 'config/config.php';

//Autoloader
spl_autoload_register(function ($className)
{
    require_once 'libs/'.$className.'.php';
});