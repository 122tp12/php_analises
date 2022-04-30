<?php
if(isset($_GET["mes"])) {
    echo "<h2>".$_GET["mes"]."</h2>";
}?>
<div class="formR">
<form action="<?=Url::getAction('autoresation', 'sendMail')?>" method="post">
    <label for="login">Login:</label><input class="form-control" type="text" name="login" id="login" required/>


<br/>
    <input class="btn btn-primary" type="submit" value="Ok"/>
</form>
</div>
<?php
