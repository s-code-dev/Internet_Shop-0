
<h3><?php if(isset($text)){echo $text;}?></h3>
<br>



<form class="form_M" method="post">
    <h2 title="Форма регистрации на сайте">РЕГИСТРАЦИЯ</h2>
    <input class="form_i" type="text" name="name" placeholder="Введите имя" required>
    <input class="form_i" type="text" name="login" placeholder="Введите логин" required>
    <input class="form_i" type="number" name="telefone" placeholder="Введите Телефон" required>
	<input class="form_i" type="password" name="password" placeholder="Введите пароль" required>
	<input class="button" type="submit" name="button" value="Зарегистрироваться">
</form>

<script>
if($_SESSION['admin_id'] || $_SESSION['user_id']){
    document.getelementsbyclassname('.form_M').style.display="none";
}

</script>


