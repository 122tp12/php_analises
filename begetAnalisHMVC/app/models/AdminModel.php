<?php


class AdminModel extends Model
{
    public function __construct()
    {

    }

    private static $instance = NULL;

    public static function Instance()
    {
        return self::$instance === NULL ? self::$instance = new self() : self::$instance;
    }

    public function autoresation($log, $pas){

        $result=DatabaseModule::instance()->query("select * from `admins` where `admins`.`login`='".$log."' and `admins`.`password`='".$pas."'");

        foreach ($result as $item){
            return $item;
        }
        return "bad";

    }
    public function getTableUsers(){

        $result=DatabaseModule::instance()->query("select * from `user`");
$str="";
        foreach ($result as $item){
            $str.="<tr><input type='hidden' value='".$item["id"]."' name='id'/><td>".$item["id"]."</td><td><input type='text' name='name' value='".$item["name"]."'/></td><td><input type='text' value='".$item["login"]."' name='login'/></td><td><input type='text' value='".$item["password"]."' name='password'/></td><td><input type='submit' value='delete' name='act'/></td><td><input name='act' type='submit' value='edit'/></td></tr>";//TODO:ne robit forma
        }
$str.="";
        return $str;
    }
    public function actUser(){
        if(isset($_POST["edit"])){
            DatabaseModule::instance()->execute("UPDATE `user` SET `name` = ".$_POST["name"].", `login` = ".$_POST["login"].", `password`=".$_POST["password"]." WHERE `id`=".$_POST["id"]);

        }
        else{
            DatabaseModule::instance()->execute("DELETE FROM `user` WHERE `id`=".$_POST["id"]);
        }
        $this->redirect(Url::local("admin/"));
    }
    public function setUser($name, $login, $password, $man){
        try {
            if ($_POST["man"] == "man") {
                DatabaseModule::instance()->execute("INSERT INTO `user`(`name`, `login`, `password`, `man`) VALUES (\"" . $_POST["name"] . "\", \"" . $_POST["login"] . "\", \"" . $_POST["password"] . "\", 1)");
            } else {
                DatabaseModule::instance()->execute("INSERT INTO `user`(`name`, `login`, `password`, `man`) VALUES (\"" . $_POST["name"] . "\", \"" . $_POST["login"] . "\", \"" . $_POST["password"] . "\", 0)");
            }
        }
        catch (Exception $ex) {
            echo $ex."<br/>";
            echo "INSERT INTO `user`(`name`, `login`, `password`, `man`) VALUES (\"" . $_POST["name"] . "\", \"" . $_POST["login"] . "\", \"" . $_POST["password"] . "\", 1)";
        }

    }
}