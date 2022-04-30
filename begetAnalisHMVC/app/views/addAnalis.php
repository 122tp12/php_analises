<div class="form-group my-group">
<form method="post" action="<?=Url::getAction("analis","save")?>">
<?php
    echo AnalisModel::getFilds($_POST["id"]);
?>
    <label for="date">Date:</label><input class=\"form-control\" id="date" type="date" name="date">
    <br/>
    <br/>
    <input class="btn btn-primary" type="submit"/>
</form>
</div>