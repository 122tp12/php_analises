<form action='admin/userAct' method='post'>
<table>
<?php
echo AdminModel::Instance()->getTableUsers();
?>
</table>
</form>
<form method="post" action="<?=Url::getAction("admin","user")?>">
    <span>Name:</span><input name="name" type="text"/><br/>
    <span>Login:</span><input name="login" type="text"/><br/>
    <span>Password:</span><input name="password" type="password"/><br/>
    <span>Man:</span><input name="man" type="radio" value="man" checked/><br/>
    <span>Woman:</span><input name="man" type="radio" value="woman"/><br/>
    <input type="submit" name="set" value="send"/>
</form>