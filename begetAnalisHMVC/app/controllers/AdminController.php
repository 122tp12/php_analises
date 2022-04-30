<?php


class AdminController extends Controller
{
    public function action_index()
    {
        $v = new View("mainAdmin");
        $v->title = "main";


        $v->viewTemplate("cheakedAdmin");

        $this->responce($v);
    }
    public function action_autoresation()
    {
        $v = new View("autoresationAdmin");
        $v->title = "autoresation";


        $v->viewTemplate("uncheakedAdmin");

        $this->responce($v);
    }
    public function action_join()
    {

        $result = AdminModel::Instance()->autoresation($_POST["login"], $_POST["password"]);


        if ($result == "bad") {

        } else {

            $_SESSION["aid"] = $result["id"];
        }
        $this->redirect(Url::local("admin/"));

    }
    public function action_exit(){
        unset($_SESSION["aid"]);

        $this->redirect(Url::local("main"));
    }






    public function action_user(){
        if(isset($_POST["set"])){

            AdminModel::Instance()->setUser($_POST["name"], $_POST["login"], $_POST["password"], $_POST["man"]);
        }


        $v = new View("mainAdminUser");
        $v->title = "user";


        $v->viewTemplate("cheakedAdmin");

        $this->responce($v);
    }
    public function action_userAct(){
        AdminModel::Instance()->actUser();
        $this->redirect("admin/user");
}

}