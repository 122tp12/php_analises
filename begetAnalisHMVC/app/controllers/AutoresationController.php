<?php




class AutoresationController extends Controller
{
    public function action_index()
    {
        $v = new View("autoresation");
        $v->title = "autoresation";

        $v->mes=$_GET["message"];
        $v->viewTemplate();

        $this->responce($v);
    }

    public function action_join()
    {

        $model = new RegistrationModel();
        $result = $model->autoresation($_POST["login"], $_POST["password"]);

        if ($result == "bad") {
            $this->redirect(Url::local("autoresation?message=Wrong login or password"));
        } else {

            $_SESSION["id"] = $result["id"];
            $this->redirect(Url::local("main/"));
        }


    }

    //INSERT INTO `change_user`(`user_id`) SELECT `user`.`id` FROM `user` WHERE `user`.`login`="lll"
    public function action_sendMail()
    {
        $l=$_POST["login"];

        $result=DatabaseModule::instance()->query("select * from `user` where `login`=\"".$l."\"");
        $bool=false;
        foreach ($result as $i){
            $m=$i["email"];
            $bool=true;
        }
        if($bool) {
            $res = RegistrationModel::save($l);
            $res = base64_encode($res);

            mail($m, "Change password", "http://analisself.pp.ua/autoresation/changePass/" . $res);
            $this->redirect(Url::local("autoresation/"));
        }
        else{
            $this->redirect(Url::local("autoresation/mail?mes=Wrong+login"));
        }
    }
    public function action_mail()
    {
        $v = new View("mail");
        $v->title = "mail";


        $v->viewTemplate();

        $this->responce($v);
    }
    public function action_changePass()
    {
        $id=(int)Router::getUriParam("id");
        echo $id;
        $v = new View("changePass");
        $v->title = "changePass";


        $v->viewTemplate();

        $this->responce($v);

    }
    public function action_changePassHandler()
    {
        $password=$_POST["password"];
        $id=base64_decode($_POST["id"]);

        RegistrationModel::change($id, $password);

        $this->redirect(Url::local("autoresation/"));
    }

}