<?php
class Autoloader{
    const PATTERN="/^([A-Z0-9][A-Za-z0-9]+)([A-Z][a-z]+)$/";
    const PATHS=[
        "Model"=>MODELS_PATH,
        "Helper"=>HELPER_PATH,
        "Module"=>MODULES_PATH
    ];
    public static function load($name){
               if(!preg_match(self::PATTERN,$name,$arr))return;
        if(empty(self::PATHS[$arr[2]]))return;
        $path=self::PATHS[$arr[2]];
        include $path.="$name.php";
    }
}