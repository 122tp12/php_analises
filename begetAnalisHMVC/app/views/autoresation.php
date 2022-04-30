
<?=HTMLhelper::js('registration');
?>
<div class="formR">
<h3 style="color: red"><?=$mes?></h3>

<form action="<?=Url::getAction('autoresation', 'join')?>" method="post">
   <label for="login">Login:</label><input class="form-control" type="text" name="login" id="login" required/>

    <label for="password">Password:</label><input class="form-control" type="password" id="password" name="password" required/>

    <a href="<?= Url::getAction('autoresation', 'mail')?>" >Забули пароль?<a/>
        <br/>
  <input class="btn btn-primary" type="submit" value="Ok"/>
        <a href="<?= Url::getAction('registration', '')?>" class="btn-primary btn">Реєстрація<a/>
</form>

</div>
<?php
