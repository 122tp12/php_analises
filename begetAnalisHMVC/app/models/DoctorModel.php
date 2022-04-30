<?php


class DoctorModel extends Model
{
    public function __construct(){

    }
    private static $instance=NULL;
    public static function Instance(){return self::$instance===NULL? self::$instance= new self():self::$instance;}

    public function getLinksOfLinks($user){
        $result=DatabaseModule::instance()->query("SELECT `analis_type`.`name` as 'analis_type_name' FROM `result` INNER JOIN `analis_param` on `analis_param`.`id`=`id_analis_param` INNER JOIN `analis_type` on `analis_type`.`id`=`analis_param`.`id_analis_type` WHERE `id_user`=".$user);

        $links="<ul>";
$past="";
        foreach ($result as $item) {
            if ($past != $item["analis_type_name"]) {
                $links .= "<li><a href='#" . $item["analis_type_name"] . "'>" . $item["analis_type_name"] . "</a></li>";
                $past = $item["analis_type_name"];
            }
        }
        $links.="</ul>";
        return $links;
    }
    public function getAnalisTypeOption($user){
        //analis_type_name
        $result=DatabaseModule::instance()->query("SELECT `analis_type`.`name` as 'analis_type_name' FROM `result` INNER JOIN `analis_param` on `analis_param`.`id`=`id_analis_param` INNER JOIN `analis_type` on `analis_type`.`id`=`analis_param`.`id_analis_type` WHERE `id_user`=".$user." GROUP BY `analis_type_name`");


        $opt="<option value='none'>none</option>";
        foreach ($result as $item) {




                if ($_GET["analis"] == $item["analis_type_name"]&&$_GET["subm"]!="Reset") {
                    $opt .= "<option value='" . $item["analis_type_name"] . "' selected>" . $item["analis_type_name"] . "</option>";
                } else {
                    $opt .= "<option value='" . $item["analis_type_name"] . "'>" . $item["analis_type_name"] . "</option>";
                }

        }

        return $opt;
    }
    public function getMinDate($user){
try {
    $result = DatabaseModule::instance()->query("SELECT `date` FROM `result` where `id_user`=" . $user . " GROUP BY `date` ORDER BY `date`");

    foreach ($result as $item) {
        return $item["date"];
    }
}
catch (Exception $es){
    echo $es;
    die;
}
    }
    public function getMaxDate($user){
        $result=DatabaseModule::instance()->query("SELECT `date` FROM `result` where `id_user`=".$user." GROUP BY `date` ORDER BY `date` desc");
        foreach ($result as $item) {
            return $item["date"];
        }
    }

    public function generateLinks($user){

        try {
        $result=DatabaseModule::instance()->query("SELECT `man` from `user` WHERE `id`=".$user);
        $man=1;
        foreach ($result as $i){
            $man=$i["man"];
        }
        $sqlCommand="SELECT `result`.`id`, `id_user`, `result`.`value`, `date`, `analis_param`.`value` as 'analis_param_value', `analis_param`.`from`, `analis_param`.`to`, `analis_param`.`scale`, `analis_param`.`name` as 'analis_param_name', `analis_type`.`name` as 'analis_type_name' FROM `result` INNER JOIN `analis_param` on `analis_param`.`id`=`id_analis_param` INNER JOIN `analis_type` on `analis_type`.`id`=`analis_param`.`id_analis_type` WHERE `id_user`=" . $user;

            if($_GET["subm"]!="Reset") {
                if (!((!isset($_GET["date2"]) && !isset($_GET["date1"]) && !isset($_GET["analis"])) || ($_GET["analis"] == "none" && $_GET["date1"] == "none" && $_GET["date2"] == "none"))) {
                    if ($_GET["date2"] != "") {
                        $sqlCommand .= " and `date`>=\"" . $_GET["date2"] . "\"";
                    }
                    if ($_GET["date1"] != "") {
                        $sqlCommand .= " and `date`<=\"" . $_GET["date1"] . "\"";
                    }
                    if ($_GET["analis"] != "none") {
                        $sqlCommand .= " and `analis_type`.`name`=\"" . $_GET["analis"] . "\"";
                        //$result = DatabaseModule::instance()->query("SELECT `result`.`id`, `id_user`, `result`.`value`, `date`, `analis_param`.`value` as 'analis_param_value', `analis_param`.`from`, `analis_param`.`to`, `analis_param`.`scale`, `analis_param`.`name` as 'analis_param_name', `analis_type`.`name` as 'analis_type_name' FROM `result` INNER JOIN `analis_param` on `analis_param`.`id`=`id_analis_param` INNER JOIN `analis_type` on `analis_type`.`id`=`analis_param`.`id_analis_type` WHERE `id_user`=" . $user . " and `analis_type`.`name`=\"" . $analis_type . "\"");
                    }
                }
            }
        $result = DatabaseModule::instance()->query($sqlCommand);

$past="";
$pastDate="";
    foreach ($result as $item) {
        if ($past != $item["analis_type_name"]) {

            $str .= "<tr><td class='nameT' scope='row' id='" . $item["analis_type_name"] . "'>" . $item["analis_type_name"] . "</td></tr>";
            $past = $item["analis_type_name"];
            $pastDate = "";
        }
        if ($pastDate != $item["date"]) {

            $str .= "<tr class='dateT'><td></td><td></td><td></td><td></td><td></td><td scope='row'>" . $item["date"] . "</td></tr>";
            $pastDate = $item["date"];
        }
        if($man==1) {
            if ($item["from"] <= $item["value"] && $item["to"] >= $item["value"]) {
                $str .= "<tr class='correct'><td>" . $item["analis_param_name"] . "</td><td>" . $item["value"] . "</td><td>" . $item["analis_param_value"] . "</td><td>" . $item["from"] . "</td><td>" . $item["to"] . "</td></tr>";//TODO:insert it to page
            } else {
                $str .= "<tr class='wrong'><td>" . $item["analis_param_name"] . "</td><td>" . $item["value"] . "</td><td>" . $item["analis_param_value"] . "</td><td>" . $item["from"] . "</td><td>" . $item["to"] . "</td></tr>";//TODO:insert it to page
            }
        }
        else{
            if ($item["from"] * $item["scale"] <= $item["value"] && $item["to"] * $item["scale"] >= $item["value"]) {
                $str .= "<tr class='correct'><td>" . $item["analis_param_name"] . "</td><td>" . $item["value"] . "</td><td>" . $item["analis_param_value"] . "</td><td>" . $item["from"] * $item["scale"] . "</td><td>" . $item["to"] * $item["scale"] . "</td></tr>";//TODO:insert it to page
            } else {
                $str .= "<tr class='wrong'><td>" . $item["analis_param_name"] . "</td><td>" . $item["value"] . "</td><td>" . $item["analis_param_value"] . "</td><td>" . $item["from"] * $item["scale"] . "</td><td>" . $item["to"] * $item["scale"] . "</td></tr>";//TODO:insert it to page
            }
        }
    }
}
catch (Exception $ex){
    echo $ex;
    die;
}
        return $str;
    }
    function getMass($id_user){
        $result=DatabaseModule::instance()->query("SELECT `result`.`id`, `id_user`
     , `result`.`value`, `date`,
       `analis_param`.`value` as 'analis_param_value',
        `analis_param`.`from`,
       `analis_param`.`to`,
       `analis_param`.`name` as 'analis_param_name',
        `analis_type`.`name` as 'analis_type_name'
FROM `result` INNER JOIN `analis_param` on `analis_param`.`id`=`id_analis_param` INNER JOIN `analis_type` on `analis_type`.`id`=`analis_param`.`id_analis_type` WHERE `id_user`=".$id_user);
        $mas=[];
        foreach ($result as $item) {
            array_push($mas,["id"=>$item["id"],
                "id_user"=>$item["id_user"],
                "value"=>$item["value"],
                "date"=>$item["date"],
                "analis_param_value"=>$item["analis_param_value"],
                "from"=>$item["from"],
                "to"=>$item["to"],
                "analis_param_name"=>$item["analis_param_name"],
                "analis_type_name"=>$item["analis_type_name"],]);

        }
        return $mas;
    }
    public function generateXlsFile($idUser){

        $exel =new PHPExcel();
    try {
        $exel->setActiveSheetIndex(0);
        $sheet = $exel->getActiveSheet();

        $sheet->setTitle("titlus");
        $sheet->mergeCells("B2:D2");

        $sheet->setCellValue("A3", "analis_param_name");
        $sheet->setCellValue("B3", "Value");
        $sheet->setCellValue("C3", "analis_param_value");
        $sheet->setCellValue("D3", "from");
        $sheet->setCellValue("E3", "to");
        $sheet->setCellValue("F3", "date");
        $count = 4;

        $arrayData = DoctorModel::Instance()->getMass($idUser);

        $pasedAPV = "";
        $pasedDate = "";
        for ($i = 0; $i < count($arrayData); $i++, $count++) {
            if ($pasedAPV != $arrayData[$i]["analis_type_name"]) {
                $pasedAPV = $arrayData[$i]["analis_type_name"];
                $sheet->setCellValue("A" . $count, $arrayData[$i]["analis_type_name"]);
                $i--;
            } else {
                if ($pasedDate != $arrayData[$i]["date"]) {
                    $pasedDate = $arrayData[$i]["date"];
                    $sheet->setCellValue("F" . $count, $arrayData[$i]["date"]);
                    $i--;
                } else {
                    $sheet->setCellValue("A" . $count, $arrayData[$i]["analis_param_name"]);//TODO:Sompting bad, fix plese
                    $sheet->setCellValue("B" . $count, $arrayData[$i]["value"]);
                    $sheet->setCellValue("C" . $count, $arrayData[$i]["analis_param_value"]);
                    $sheet->setCellValue("D" . $count, $arrayData[$i]["from"]);
                    $sheet->setCellValue("E" . $count, $arrayData[$i]["to"]);
                }
            }
        }
        $drw = new PHPExcel_Worksheet_Drawing();


        $sheet->getRowDimension("1")->setRowHeight(75);

        $style = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '01B050')
            )
        );

        $sheet->getStyle("A3")->applyFromArray($style);
        $sheet->getStyle("B3")->applyFromArray($style);
        $sheet->getStyle("C3")->applyFromArray($style);
        $sheet->getStyle("D3")->applyFromArray($style);
        $sheet->getStyle("E3")->applyFromArray($style);

        $writer = new PHPExcel_Writer_Excel5($exel);
        $name = $idUser . ".xls";
        if (file_exists($name)) {
            unlink($name);
        }
        $writer->save($name);
    }
    catch (Exception $ex){
        echo $ex;
        die;
        }
    }
}