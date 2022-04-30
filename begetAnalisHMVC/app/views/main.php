<span style="position: absolute; left: 120px;top: 200px">
    <h2>Додавання аналіза</h2>
<form action="<?=Url::getAction("analis","add")?>" method="post">

    <p><select name="id">
<?php
//$a= base64_encode('1');
echo AnalisModel::getAnalisSelectors();
//echo "aa";
?>

        </select></p>
    <p><input class="btn btn-primary" type="submit" value="Отправить"></p>
</form>
</span>
<span style="position: absolute; right: 120px;top: 200px">
<h2>Показати мої аналізи</h2>
<p>Твоя силка:</p>
<a style="border: solid; padding: 5px" class="link-primary" href="/doctor/<?=base64_encode($_SESSION["id"])?>">http://analisself.pp.ua/doctor/<?=base64_encode($_SESSION["id"])?></a>
    </span>
<img class="qrcode" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://analisself.pp.ua/doctor/<?=base64_encode($_SESSION["id"])?>"/>