<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/10/2019
 * Time: 10:35 AM
 */

class Controller
{


    protected $model = '';


    public function model(){
        require APPROOT.'/Models/'.$this->model.'.php';
        $this->model = new $this->model();

    }

    public function views($path,$data = []){
        require APPROOT.'/Views/'.$path.'.php';
    }
}