<?php


class TelegramController extends Controller
{
    public function action_index(){
        $v=new View("telegram");
        $v->title="telegram";


        $v->viewTemplate("cheakedAdmin");

        $this->responce($v);
    }
}