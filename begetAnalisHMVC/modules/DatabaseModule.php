<?php
session_start();
class DatabaseModule
{
private $dbh,$tables,$table=NULL;
private static $instance = NULL;
public static function instance(){
    return self::$instance===NULL
        ? self::$instance=new self()
        : self::$instance;

}
public function __construct()
{
    $config = ConfigModule::load("Database/Database");
       $opt=[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ];
    $this->dbh=new PDO("mysql:host=localhost;dbname=lazokifc_analis","lazokifc_analis","Ivan254478",$opt
         );
    $this->tables = $this->dbh->query("SHOW TABLES;")->fetchAll(PDO::FETCH_COLUMN);

}
    public function query($string)
    {
            $result=$this->dbh->query($string);
            return $result;

    }
    public function execute($string)
    {
            $this->dbh->query($string);


    }
}