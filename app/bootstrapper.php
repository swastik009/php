<?php




require 'libraries/Core.php';
require 'libraries/Controller.php';
require 'config.php';




spl_autoload_register(function($className){
    include $className.'.php';
});

