<?php


class MainController extends Controller
{
    public function action_index(){

        $v=new View("main");
        $v->title="main";


        $v->viewTemplate("cheakedTM");

        $this->responce($v);

    }

    public function action_exit(){
        unset($_SESSION["id"]);

        $this->redirect(Url::local("main"));
    }
    public function action_about(){
        $v=new View("about");
        $v->title="about";


        $v->viewTemplate("default");

        $this->responce($v);
    }



    public function action_dow(){

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $file=$id.".xls";

            DoctorModel::Instance()->generateXlsFile($id);

             header('Content-Type: application/xls');
                header("Content-Disposition: attachment; filename=\"$file\"");
                readfile($file);
            unlink($file);
        }
        $this->redirect("/main");
    }
}