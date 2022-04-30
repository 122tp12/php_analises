<?php
session_start();
require_once CORE_BASE_PATH."Controller.php";
require_once CORE_BASE_PATH."Model.php";
require_once CORE_BASE_PATH."View.php";
require_once CORE_CLASSES_PATH."Router.php";
require_once EXEPTION_PATH."exeption_loader.php";
require_once CORE_CLASSES_PATH."Autoloader.php";
require_once CORE_CLASSES_PATH."Url.php";
require_once HELPER_PATH."HTMLhelper.php";
require_once CORE_PATH."classes/PHPExcel-1.8/Classes/PHPExcel.php";
require_once CORE_PATH."classes/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php";

spl_autoload_register("Autoloader::load");
/*Router::add("analis/registration/<asd>",[
    "controller"=>"Registration",
    "action"=>"index"
]);*/

Router::add("autoresation/changePass/<id>?",[
    "controller"=>"autoresation",
    "action"=>"changePass",
    "id"=>1
]);
Router::add("doctor/<idU>?",[
    "controller"=>"doctor",
    "action"=>"index",
    "idU"=>1,
]);
try {
    Router::Run();
}catch (RoutExeption $e){
    echo $e->getMessage();
    Router::Load("404");
}
