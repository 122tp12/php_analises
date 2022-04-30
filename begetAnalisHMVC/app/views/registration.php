
<?=HTMLhelper::js('registration');
session_start();
?>

<h3 style="color: red;
    position: absolute;
    top: 150px;
    left: 100px;"><?=$_GET["message"]?></h3>


<div class="formR">
    <a href="<?= Url::getAction('autoresation', '')?>" class="btn-primary btn bbuton">Назад</a>
<form action="<?=Url::getAction('registration', 'save')?>" method="post">
    <label for="login">Login:</label><input class="form-control" type="text" name="login" id="login" required/>

    <label for="password">Password:</label><input class="form-control" type="password" id="password" name="password" required/>

    <label for="name">Name:</label><input class="form-control" type="text" id="name" name="name" required/>
    <label for="name">Email:</label><input class="form-control" type="email" id="email" name="email" required/>
    <br/>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sex" id="man" checked value="mele">
        <label class="form-check-label" for="man">
            Man
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sex" id="wo" value="femele">
        <label class="form-check-label" for="wo">
            Woman
        </label>
    </div>


<br/>
    <input class="btn btn-primary" type="submit" value="Ok"/>
</form>
</div>
<?php
