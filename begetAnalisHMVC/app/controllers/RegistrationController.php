<?php
class RegistrationController extends Controller
{

    public function action_index(){
        $v=new View("registration");
        $v->title="registration";


        $v->viewTemplate();

        $this->responce($v);
    }
    public function action_save()
    {

        if ($_POST["sex"] == "mele") {
            $man = 1;
        } else {
            $man = 0;
        }
        $result = RegistrationModel::Instance()->registration($_POST["login"], $_POST["password"], $_POST["name"], $man, $_POST["email"]);

        if ($result == "ne ok") {
            $this->redirect(Url::local("registration?message=Логін вже зайнятий"));
        } else {
            $this->redirect(Url::local("main/"));
        }
    }

}