<?php
class tgBot{
    private $token;
    public function __construct($tokenl)
    {
        $this->token=$tokenl;
    }
    public function sFile($w, $file){
        if(!$this->token){
            return 21;
        }
        $url="https://api.telegram.org/bot".$this->token."/sendDocument";
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id"=>$w, "document"=>$file]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Counter-Type:multipart/form-data"]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $out=curl_exec($ch);
        curl_close($ch);

    }
    private function get($s){
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL,$s);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $r=curl_exec($ch);
        if($r==NULL){
            return "Error:".curl_errno($ch)."-".curl_error($ch);
        }
        else{
            return $r;
        }
        curl_close($ch);
    }
    public function SMessage($w,$s,$keyboard=true){
        if(!$this->token){
            return 21;
        }
        if(is_array($keyboard)){
            $reply=json_encode(array("keyboard"=>$keyboard, "resize_keyboard"=>true,"one_time_keyboard"=>true));
            return $this->get("https://api.telegram.org/bot".$this->token."/sendmessage?".http_build_query(array("chat_id"=>$w,"text"=>$s,'reply_markup'=>$reply)));

        }
        return $this->get("https://api.telegram.org/bot".$this->token."/sendmessage?".http_build_query(array("chat_id"=>$w,"text"=>$s)));

    }
    public function update_id($s){
        switch ($s){
            case 'r':
                if(file_exists("update_id.txt")){
                    return file_get_contents("update_id.txt");
                }
                else{
                    return 0;
                }
                break;
            default:
                file_put_contents("update_id.txt", $s);
                break;

        }
    }
    public  function getUpdates(){
        if(!$this->token){
            return 21;
        }
        $r=json_decode($this->get("https://api.telegram.org/bot".$this->token."/getupdates?offset"), true);
        return $r["result"];
    }
    public function requestToTelegram($data, $type){
        $res=null;
        if(is_array($data)){
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$this->token.'/'.$type);
            curl_setopt($ch, CURLOPT_POST, count($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $res=curl_exec($ch);
        }
        return $res;
    }
    public function getPhotoPath($file_id){
        $arr=json_decode($this->requestToTelegram(['file_id'=>$file_id], "getFile"), TRUE);
        return $arr['result']['file_path'];
    }
    public function copyPhoto($file_path){
        $file_from_t="https://api.telegram.org/file/bot".$this->token."/".$file_path;
        $ext=end(explode(".", $file_path));
        $name_our_new_file=time().".".$ext;
        return copy($file_from_t, "img/".$name_our_new_file);
    }
    public function getPhoto($data){
        echo "<br>";
        $file_id=$data["file_id"];
        $file_path=$this->getPhotoPath($file_id);
        return $this->copyPhoto($file_path);
    }
}