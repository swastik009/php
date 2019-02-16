<?php




require 'config.php';




spl_autoload_register(function($className){
    include 'libraries/'.$className.'.php';
});

