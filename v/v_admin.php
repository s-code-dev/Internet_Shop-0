
<h2 style="  text-aling:center; display:block; margin:0 auto">Заказы:</h2>
<table style="border:1px solid black; width:100%; margin:0 50px 0 50px">
	<tr >
        <th>Имя заказчика</th>
        <th>Номер телефона</th>
		<th>Заказал</th>
		<th>Стоимость товара</th>
		<th>Количество</th>
		<th>Общая стоимость товара </th>
	</tr>
	<?php
		$order = 0;
		if (isset($adminorder)) {
			foreach ($adminorder as $product){
				echo "<tr>
                        <td>" . $product["name"] . "</td>
                        <td>" . $product["telefone"] . "</td>
                        <td>" . $product["title"] . "</td>
                        <td>" . $product["price"] . "</td>
                        <td>" . $product["count"] . "</td>
                        <td>" . $product["count"] * $product["price"] . "</td>
                        <td>
                            <form method='post' name='delete_form'>
                                <input type='hidden' name='order' value='" . $product["order_id"] . "'>
                                <input type='submit' name='submit' value='Заказ выполнен'>
                            </form>
                        </td>
                     </tr>";
				$order += $product["count"] * $product["price"];
			}
		}
	?>
</table>
<h2><?= "Итоговая сумма заказов: " . $order . " руб"?></h2>


