<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/10/2019
 * Time: 10:35 AM
 */

class Controller
{

    /**
     * All sub controller should extend this controller
     */
    public function model(){
        /**
         * model accessor
         */

    }

    public function views($path){
        require APPROOT.'/Views/'.$path.'.php';
    }
}