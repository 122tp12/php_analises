<?php
header('refresh: 2');
require_once CORE_CLASSES_PATH."class_tgBot.php";
require_once CORE_CLASSES_PATH."menuPoints.php";

$c=new tgBot('1875432749:AAFsbBsH_eSioDvqwPzdoLieGVEVlJzrtaA');
$r=$c->getUpdates();

foreach ($r as $i=>$v){
    if($c->update_id('r')<$r[$i]['update_id']){

        echo $r[$i]['update_id'];
        $c->update_id($r[$i]['update_id']);
        $chatID=$r[$i]['message']['chat']['id'];
        $name=$r[$i]['message']['from']['first_name'];
        $login=$r[$i]['message']['from']['last_name'];
        $userID=$r[$i]['message']['from']['id'];
        $mess=mb_strtolower($r[$i]['message']['text'], "UTF-8");
        echo $mess."<br/>";

        echo $name."<br/>";
        echo $login."<br/><br/>";


        if($mess==$start){
            echo "a";
            echo $c->SMessage($chatID,"Guten tag, я is український analis робот");
            echo $c->SMessage($chatID,"This is твій меню:",$menu1);
        }

        elseif($mess==$allAnalis){
            echo "c";
            echo $c->SMessage($chatID,"Наші аналізи:");
            $result=DatabaseModule::instance()->query("SELECT * FROM `analis_type`");

            foreach ($result as $i){
                echo $c->SMessage($chatID,$i["name"]);
            }

        }
        elseif($mess==$menu){
            echo "b";
            echo $c->SMessage($chatID,"This is твій меню:",$menu1);
        }
        elseif (explode(' ',$mess)[0]==$cheak){
            if(isset(explode(' ',$mess)[1])){
               $res=DatabaseModule::instance()->query("SELECT `result`.`id`, `result`.`id_user`, `analis_param`.`name`, `analis_param`.`value`, `analis_param`.`from`,`analis_param`.`to`,`analis_param`.`scale`, `result`.`value` as 'value2', `result`.`date`, `analis_type`.`name` as 'name2' FROM `result`, `analis_param`, `user`, `analis_type` WHERE `analis_type`.`id`=`analis_param`.`id_analis_type` and `analis_param`.`id`=`result`.`id_analis_param` and `user`.`login`=\"".explode(' ',$mess)[1]."\"  ORDER BY `analis_type`.`name`");
                $par='';
                $str='';
                foreach ($res as $i){
                    var_dump($i);
                    if($i['name2']==$par){

                        $str.=$i['name']."(".$i['value'].", ".$i['standart']."):".$i['value2']."\n";
                    }
                    else{
                        if($par!=''){
                            echo $c->SMessage($chatID,$par."\n".$str);
                        }
                        $par=$i['name2'];
                    }
                }
                echo $c->SMessage($chatID, $par."\n".$str);
            }
            else {
                echo $c->SMessage($chatID, "Після команди введіть свій login");
            }
        }

        elseif (explode(' ',$mess)[0]==$doc){
            if(isset(explode(' ',$mess)[1])){
                $result=DatabaseModule::instance()->query("select * from `user` where `user`=\"".explode(' ',$mess)[1]."\"");
                foreach ($result as $i){
                    $id=$i["id"];
                }


                DoctorModel::Instance()->generateXlsFile($id);
                $docum=new CURLFile(realpath($id.".xls"));
                $c->sFile($chatID, $docum);
                unlink($id.".xls");
            }
            else {
                echo $c->SMessage($chatID, "Після команди введіть свій login");
            }
        }

        else{
            echo $c->SMessage($chatID,"Я dont know цю команду");
        }
    }
}