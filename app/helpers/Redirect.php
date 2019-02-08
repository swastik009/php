<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/3/2019
 * Time: 10:57 PM
 */

namespace Helpers;


class Redirect
{
    /**
     * @param $path
     */

    public static function Location($path)
    {
        echo "<script> window.location.href = '" . $path . ".php'; </script>";
    }
}