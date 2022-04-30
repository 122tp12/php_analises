<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="theme-color" content="#35bc7a"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Пример</title>
    <?=HTMLhelper::css('bootstrap');?>
    <?=HTMLhelper::css('style');?>
</head>
<body >
<div id="main" class="main-holder"> <!--Begin #motopress-main-->
    <header>
        <a href="/main">
            <?=HTMLhelper::image("logo.png");?>
        </a>
        <h2><a href="/main">Аналізи</a></h2>
        <nav>
            <a class="menubuttons" href="<?=Url::local('item')?>">Tables</a>
            <?php
            if($_SESSION["aid"]!=null){
                echo "<a class=\"menubuttons\" href=\"/admin/exit\">Вийти з акаунту</a>";

            }
            else{
                echo "<a class=\"menubuttons\" href=\"/admin/autoresation\">Увійти в акаунт</a>";
            }
            ?>
        </nav>
    </header>

    <div >
        <?php
        if($_SESSION["aid"]!=null){
            echo $content;

        }
        else{


            echo "<h2>Щоб продовжити <a href='/admin/autoresation'>афторизуйтесь</a></h2>";
        }
        ?>

        <div class="clear"></div>
    </div>
    <footer class="motopress-wrapper footer">

    </footer>
</div>
</body>
</html>