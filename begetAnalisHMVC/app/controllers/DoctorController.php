<?php



class DoctorController extends Controller
{
    public function action_index(){

        $idUser=base64_decode(Router::getUriParam("idU"));
        $v = new View("doctor");
        $v->title = "Analis";

        $v->viewTemplate("default");
        $v->idUser=$idUser;
        $this->responce($v);
    }

}