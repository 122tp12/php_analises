<div class="formR">
<form action="<?=Url::getAction('autoresation', 'changePassHandler')?>" method="post">
    <label for="password">New password:</label><input class="form-control" type="password" id="password" name="password" required/>
    <input type="hidden" name="id" value="<?=base64_encode(Router::getUriParam("id"))?>">
    <input class="btn btn-primary" type="submit" value="Change"/>
</form>
</div>
<?php
