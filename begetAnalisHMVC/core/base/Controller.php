<?php

abstract class Controller
{
    private $responce;
    public  function header($name,$value){
        echo "<script>location='{$value}';</script>";
    }
    protected function redirect($url){
        $this->header("Location",$url);
    }
    private $gz=false;
    private function __responceGZ(){
              return gzencode($this->responce,5);
    }
    private function __responce(){
        return $this->responce;
    }
    private  function supportGZ(){
        return strpos($_SERVER["HTTP_ACCEPT_ENCODING"],'gzip'!=false);
    }
protected function responce($text,$gz=false){
$this->responce=$text;
$this->gz=$gz;
    }
public function getResponce($route_get=false){


    return ($this->gz && $route_get && $this->supportGZ())? $this->__responceGZ():$this->__responce();

    }
protected function get($name){
   return @$_GET[$name];
}
    protected function post($name){
        return @$_POST[$name];
    }
}