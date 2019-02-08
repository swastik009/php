<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/3/2019
 * Time: 10:56 PM
 */

namespace Helpers;



class Flash{
    /**
     * @param string $name
     * @param string $message
     * @param string $class
     */


    public static function Success($name='', $message='', $class= "alert alert-success alert-dismissible fade show"){
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){

                if(!empty($_SESSION[$name]))
                    unset($_SESSION[$name]);

                if(!empty($_SESSION[$name.'_class']))
                    unset($_SESSION[$name.'_class']);

                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;
            }

            elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name.'_class'] : "";

                echo "<div class='".$class."' role = 'alert' id='msg-flash'>".$_SESSION[$name]. "
                <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>     ";

                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }

    }


}