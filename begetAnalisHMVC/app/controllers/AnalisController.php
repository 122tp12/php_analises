<?php


class AnalisController extends Controller
{
    public function action_add(){


        $v=new View("addAnalis");
        $v->title="add analis";


        $v->viewTemplate("cheakedTM");

        $this->responce($v);

    }
    public function action_save(){

        $id_user=$_SESSION["id"];
        $id_analist_type=$_POST["analis_type"];
        $date=$_POST["date"];

        $mas=AnalisModel::getMasAnalisParam($id_analist_type);


        foreach ($mas as $i) {
            AnalisModel::insertResult($id_user,$i[0],$_POST[$i[1]],$date);
        }
        $this->redirect(Url::local("main/"));
    }
}