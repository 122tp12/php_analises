<?php


class sqlClass
{
    public $pdo;

    public function __construct() {

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $connection = "mysql:host=localhost;dbname=lazokifc_analis";
        $this->pdo = new PDO($connection, "lazokifc_analis" , "Ivan254478", $opt);

    }
    public function query($string)
    {
        try {
            $result=$this->pdo->query($string);
            return $result;
        }
        catch (Exception $exception){
            return $exception;
        }
    }
    public function execute($string)
    {
        try {
            $this->pdo->exec($string);

        }
        catch (Exception $exception){
            return $exception;
        }
    }
    public function select($table, $where=""){
        if($where=="") {
            $string = "select * from " . $table;
        }
        else{
            $string = "select * from " . $table." where ".$where;
        }
        return $this->query($string);
    }
    public function insert($table, $param, $data){

        $string = "insert into " . $table . " (" . $param[0];
        for ($i = 1; $i < count($param); $i++) {
            $string = $string . ", " . $param[$i];
        }
        $string = $string . ") values (" . $data[0];
        for ($i = 1; $i < count($data); $i++) {
            $string = $string . ", " . $data[$i];
        }
        $string = $string . ")";
        return $this->execute($string);

    }
    public  function update($table, $par, $data, $where){
        $string="update ".$table." set ".$par[0]." = ".$data[0];
        for ($i = 1; $i < count($par); $i++) {
            $string = $string . ", " . $par[$i]." = ". $data[$i];
        }
        $string=$string." where ".$where;
        return $this->execute($string);
    }
}
