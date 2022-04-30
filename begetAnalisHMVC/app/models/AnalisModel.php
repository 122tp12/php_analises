<?
class AnalisModel extends Model
{
    public function __construct(){

    }
    private static $instance=NULL;
    public static function Instance(){return self::$instance===NULL? self::$instance= new self():self::$instance;}

    public static function getFilds($id){
        $result=DatabaseModule::instance()->query("SELECT `man` from `user` WHERE `id`=".$_SESSION["id"]);
        $man=1;
        foreach ($result as $i){
            $man=$i["man"];
        }

        $result=DatabaseModule::instance()->query("SELECT `id`, `id_analis_type`, `name`, `value`, `from`, `to`, `scale` FROM `analis_param` WHERE `id_analis_type`=".$id);
        $comparerString="<input type='hidden' name='analis_type' value='".$id."'/>";
//<label for="exampleInputEmail1">Email address</label>
        $counter=1;
        if($man==1) {
            foreach ($result as $item) {
                $comparerString .= "<input type='hidden' name='analis_param" . $counter . "' value='" . $item["id"] . "'/><label for='c" . $counter . "'>" . $item['name'] . ":</label><input class=\"form-control\" id='c" . $counter . "' name='" . $item['id'] . "' placeholder='" . $item['from'] . "-" . $item['to'] . "(" . $item['value'] . ")'/><br/>";
            }
        }
        else{
            foreach ($result as $item) {
                $comparerString .= "<input type='hidden' name='analis_param" . $counter . "' value='" . $item["id"] . "'/><label for='c" . $counter . "'>" . $item['name'] . ":</label><input class=\"form-control\" id='c" . $counter . "' name='" . $item['id'] . "' placeholder='" . $item['from']*$item['scale'] . "-" . $item['to']*$item['scale'] . "(" . $item['value'] . ")'/><br/>";
            }
        }


        return $comparerString;
    }
    public static function getAnalisSelectors(){


        $result=DatabaseModule::instance()->query("SELECT * FROM `analis_type`");

        $str="";
        foreach ($result as $item){
            $str.="<option value='".$item["id"]."'>".$item["name"]."</option>";
        }
        return $str;
    }
    public static function getMasAnalisParam($id){

        $result=DatabaseModule::instance()->query("SELECT * FROM `analis_param` WHERE `id_analis_type`=".$id);
        $result=$result->fetchAll();

        $mas=[];
        $count=1;
        foreach ($result as $item){
            array_push($mas, [0=>$item["id"], 1=>$_POST["analis_param".$count]]);
            $count++;
        }
        return $mas;
    }
    public static function insertResult($id_user, $id_analis_param, $value, $date){


        DatabaseModule::instance()->execute("INSERT INTO `result`(`id_user`, `id_analis_param`, `value`, `date`) VALUES (".$id_user.",".$id_analis_param.",\"".$value."\",\"".$date."\")");

    }

}
