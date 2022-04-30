<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="theme-color" content="#35bc7a"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Аналізи</title>
    <link rel="shortcut icon" href="<?= HTMLhelper::image("logo.ico")?>" type="image/x-icon">

   <?=HTMLhelper::css('bootstrap');?>
   <?=HTMLhelper::css('style');?>
</head>
<body >
<div id="main" class="main-holder"> <!--Begin #motopress-main-->
    <header>
        <a href="<?=Url::local('main')?>">
            <?=HTMLhelper::image("logo.png");?>
        </a>
        <h2><a href="/main">Аналізи</a></h2>
        <nav>
        <a class="menubuttons" href="<?=Url::local('main/about')?>">Для чого це?</a>
            <?php
            if($_SESSION["id"]!=null){
                echo "<a class=\"menubuttons\" href=\"/main/exit\">Вийти з акаунту</a>";

            }
            else{
                echo "<a class=\"menubuttons\" href=\"/autoresation\">Увійти в акаунт</a>";
            }
            ?>
        </nav>
    </header>

<div >

<?=$content//TODO: add footer?>

<div class="clear"></div>
</div>
<footer class="motopress-wrapper footer">
   <h2></h2>
</footer>
</div>
</body>
</html>