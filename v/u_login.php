
<?php if($_SESSION['admin_id'] || $_SESSION['user_id']){
	 if(isset($text)){echo "<h3>$text</h3>";}
}

 else{
echo '<form class="form_M" method="post">
<h2 title="Форма входа на сайт">ВОЙТИ</h2>
	<input class="form_i" type="text" name="login" placeholder="Введите логин" required>
	<input class="form_i" type="password" name="password" placeholder="Введите пароль" required>
	<input class="button" type="submit" name="button" value="Войти">
</form>';
}
?>