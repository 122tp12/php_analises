<?php
session_start();
define("URLROOT","");
define("DOCROOT",$_SERVER['DOCUMENT_ROOT']."/".URLROOT);
define("APP_PATH",DOCROOT."app/");
define("CORE_PATH",DOCROOT."core/");
define("HELPER_PATH",DOCROOT."helpers/");
define("MODULES_PATH",DOCROOT."modules/");
define("CONTROLLERS_PATH",APP_PATH."controllers/");
define("MODELS_PATH",APP_PATH."models/");
define("VIEWS_PATH",APP_PATH."views/");
define("TEMPLASE_PATH",APP_PATH."templase/");
define("CORE_BASE_PATH",CORE_PATH."base/");
define("CONFIGS_PATH",APP_PATH."configs/");
define("CORE_CLASSES_PATH",CORE_PATH."classes/");
define("EXEPTION_PATH",CORE_PATH."classes/Exeptions/");
include CORE_PATH."loader.php";
