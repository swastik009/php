<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/8/2019
 * Time: 10:47 PM
 */

class abc extends Controller
{
    public function index(){
        echo "hello abc index";
    }

    public function xyz(){
        return $this->views("test");
    }
}