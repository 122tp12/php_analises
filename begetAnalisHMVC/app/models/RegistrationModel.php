<?
class RegistrationModel extends Model
{
public function __construct(){

}
private static $instance=NULL;
public static function Instance(){return self::$instance===NULL? self::$instance= new self():self::$instance;}

    public function autoresation($log, $pas){


       $result=DatabaseModule::instance()->query("select * from `user` where `user`.`login`='".$log."' and `user`.`password`='".$pas."'");

       foreach ($result as $item){
           return $item;
        }
           return "bad";

    }
    public function registration($log, $pas, $name, $man, $email){
        $result=DatabaseModule::instance()->query("select * from `user` where `login`=\"".$log."\"");
        $count=0;
        foreach ($result as $i){
            $count++;
        }
if($count==0) {

    DatabaseModule::instance()->execute("INSERT INTO `user`(`name`, `login`, `password`, `man`, `email`) VALUES (\"" . $name . "\",\"" . $log . "\",\"" . $pas . "\", " . $man . ", \"".$email."\")");
    return "ok";
}
else{
    return "ne ok";
}
    }
    public static function save($log)
    {

        $res = DatabaseModule::instance()->query("SELECT `user`.`id` as 'id' FROM `user` WHERE `user`.`login`=\"" . $log . "\"");
        foreach ($res as $item) {
            $id = $item["id"];
        }
        if (isset($id)) {
            DatabaseModule::instance()->execute("INSERT INTO `change_user`(`user_id`) VALUES (" . $id . ")");
            return $id;
        }
        echo "c";
        die;
    }
    public static function change($id, $newPassword){

$id=base64_decode($id);
        DatabaseModule::instance()->execute("UPDATE `user` SET `password`=\"".$newPassword."\" WHERE `id`=".$id);
    }
}