
<?=HTMLhelper::js('registration');
?>


<form action="<?=Url::getAction('admin', 'join')?>" method="post">
    <label for="login">Login:</label><input class="form-control" type="text" name="login" id="login" required/>

    <label for="password">Password:</label><input class="form-control" type="password" id="password" name="password" required/>

    <input class="btn btn-danger" type="submit" value="Ok"/>
</form>
<?php
