<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/8/2019
 * Time: 3:28 PM
 */




class Core
{
    protected $Controller = 'pages';
    protected $Method = 'index';
    protected $params = [];
    public function __construct()
    {
        $UrlExplode = $this->getUrl();

        if(!empty($UrlExplode[0])) {
        $this->Controller = $UrlExplode[0];
        }
        if(!empty($UrlExplode[1])) {
            $this->Method = $UrlExplode[1];
        }

        if(sizeof($UrlExplode) > 2) {
            $this->params = array_slice($UrlExplode, 2);
        }

        require '../app/controllers/'.$this->Controller.'.php';

        $this->Controller = new $this->Controller();

        call_user_func([$this->Controller,$this->Method],$this->params);

        //$this->Controller
    }

    public function getUrl(){
        if(isset($_GET['url'])) {
            $urlArr = explode('/', $_GET['url']);
            return $urlArr;
        }
    }

}