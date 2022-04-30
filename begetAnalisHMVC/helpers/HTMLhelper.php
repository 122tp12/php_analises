<?php
session_start();
class HTMLhelper
{
public static function css($name){
    return "<link rel='stylesheet' href='".Url::local("../../media/css/".$name.".css")."'/>";
}
    public static function js($name){
        return "<script src='".Url::local("../../media/js/".$name.".js")."'></script>";
    }
    public static function anchor($url,$content,$class=NULL){
        $dop=$class===NULL?"":" class='{$class}'";
        return "<a href='{$url}'{$dop}>{$content}</a>";
    }
    public static function __callStatic($name, $arguments)
    {
        $res="<{$name} ";
        $attrs=@$arguments[1];
        $content=@$arguments[0];
          if(is_array($attrs)) foreach ($attrs as $attr => $value) $res.=" {$attr}='{$value}'";
          $res.=">{$content}</{$name}>";
          return $res;
        // TODO: Implement __callStatic() method.
    }

    public static function image($name){
        return "<img src='".Url::local("../../media/images/".$name."")."'>";
    }

    public static function imageProduct($name){
        return "<img src='".Url::local("../../images/".$name."")."'>";
    }
}