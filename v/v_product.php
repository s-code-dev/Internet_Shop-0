<script>
	window.onload = function() {
		document.getElementById('buy').onclick = function() {
			document.getElementById('buy').style.display = "none";
			document.getElementById('buying_form').style.display = "block";
		};
	}
</script>

<div style="width: 100%;" class="product__full">
	<h1 style="text-align: center;display: block"><span><?= $product["title"] ?></span></h1>
	<a href="v/v_foto.php?img=<?=$product["img_big"]?>&id=<?=$product["id"]?>"><img     style="margin: 0 0px 0 17%;" class="img__full" src="../img/img_smal/<?= $product["img_smal"] ?>" alt="Изображение" title="<?= $product["title"] ?>" target="_blank"></a>
	<div style="float:right; width:60%">
	<h3 >Описание товара:</h3>
	<span  class="content"><?= $product["description"] ?></span>
    </div>
	<h3 style="text-align: center;display: block;">Цена: <?= $product["price"] ?> руб.</h3>
	<?php
	    
		if ($user_id) {
			echo "<button style='margin: 0 auto; display: block; width: 200px;height: 30px;
			margin-bottom: 20px;'id='buy'>Купить</button>
			<div style='display:none' id='buying_form'>
				<span style='text-align: center;display: block;'>Какое количество товара?</span>
				<form style='display: flex; flex-direction: column;
				justify-content: center' method='post' name='buying_form'>
					<input style='margin: 20px auto 20px auto;' type='number' name='count' required>
					<input style='margin: 0 auto 20px' type='submit' name='button'value='Добавить в корзину'>
				</form>
			</div>";
		}
		else{
			echo "<h4 style='width: 100%; text-align: center;'>Чтобы купить зарегестрируйтесь или войдите в аккаунт</h4>";
		}
	?>
</div>
<?php if(isset($text)){echo "<script>alert('$text')</script>";}?>