
<a class="btn btn-primary dwt" href="/main/dow?id=<?=$idUser?>" target="_new">Download table</a><?php //TODO:Generate exel file?>
<?= DoctorModel::Instance()->getLinksOfLinks($idUser)?>
<div class="search">
    <form action="<?= Url::local("doctor/". base64_encode($idUser))?>" method="get">
        <div class="search-d">
        <span>Analis name: </span>
        <select name="analis" class="fr">
            <?= DoctorModel::Instance()->getAnalisTypeOption($idUser)?>
        </select>
        </div>
        <div class="search-d">
        <span>Date: </span>
            <?php

            if($_GET["subm"]!="Reset") {
                if (isset($_GET["date1"])) {
                    echo "<input type=\"date\" name=\"date1\" class=\"fr\" max=\"" . DoctorModel::Instance()->getMaxDate($idUser) . "\" min=\"" . DoctorModel::Instance()->getMinDate($idUser) . "\" value=\"" . $_GET["date1"] . "\"/>";
                } else {
                    echo "<input type=\"date\" name=\"date1\" class=\"fr\" max=\"" . DoctorModel::Instance()->getMaxDate($idUser) . "\" min=\"" . DoctorModel::Instance()->getMinDate($idUser) . "\"/>";
                }
                if (isset($_GET["date2"])) {
                    echo "<input type=\"date\" name=\"date2\" class=\"fr\" max=\"" . DoctorModel::Instance()->getMaxDate($idUser) . "\" min=\"" . DoctorModel::Instance()->getMinDate($idUser) . "\" value=\"" . $_GET["date2"] . "\"/>";
                } else {
                    echo "<input type=\"date\" name=\"date2\" class=\"fr\" max=\"" . DoctorModel::Instance()->getMaxDate($idUser) . "\" min=\"" . DoctorModel::Instance()->getMinDate($idUser) . "\"/>";
                }
            }
            else{
                echo "<input type=\"date\" name=\"date1\" class=\"fr\" max=\"" . DoctorModel::Instance()->getMaxDate($idUser) . "\" min=\"" . DoctorModel::Instance()->getMinDate($idUser) . "\"/>";
                echo "<input type=\"date\" name=\"date2\" class=\"fr\" max=\"" . DoctorModel::Instance()->getMaxDate($idUser) . "\" min=\"" . DoctorModel::Instance()->getMinDate($idUser) . "\"/>";
            }


            ?>



        </div>

        <input type="submit" class="btn btn-primary fr" name="subm" value="Шукати">
        <input type="submit" class="btn btn-primary fr" name="subm" value="Reset">
    </form>
</div>
<br/>
<table class="table">
    <thead><tr><td scope="col">Назва аналіза</td><td scope="col">Значення</td><td scope="col">Розмірність</td><td scope="col">Стандарт з</td><td scope="col">Стандарт до</td><td scope="col">Дата</td></tr></thead>
<?php
echo DoctorModel::Instance()->generateLinks($idUser);

?>
</table>
