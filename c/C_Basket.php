<?php include_once 'm/Basket.php';


/**
 * Класс для корзины интернет магазина
 */

class C_Basket extends C_Base
{

	public function action_add()	{

		if (is_null($_SESSION['user_id'])){
			$_SESSION['user_id'] = 0;               
		}
		$this->title .= '';
		$lastorder = new Basket();
		$lastidorder = $lastorder->checklastorderuser($_SESSION['user_id']);

 		if($lastidorder){
			$_SESSION['order_id'] = $lastidorder['lastidorder'];
		}
		if(is_null($_SESSION['order_id'])){
			$order = new Basket();
			$lastorder = $order->checklastorderuser(!$_SESSION['user_id']);
			$_SESSION['order_id'] = $order->addneworder($_SESSION['user_id']);			
			$order->addordertouser($_SESSION['user_id'], $_SESSION['order_id']);
		}
		$goodaddbasket = new Basket();
		$goodaddbasket->addgoodtobasket($_POST['idgoods'], $_SESSION['order_id'], $_POST['counts']);
		$text .= "<div class='col-12'>Товар добавлен в корзину.<form method='post' action='index.php?c=good&act=view'><div class='form-group'><button class='btn btn-primary' type='submit'>Вернуться в Каталог</button></div></form></div>";
		$this->content = $this->Template('v/v_basket.php', array('text' => $text));	 

	}

	public function action_view()	{
		$this->title .= '::Корзина';
		if($_SESSION['order_id']){
			$viewbasket = new Basket();
			$basket_array=$viewbasket->basketget($_SESSION['order_id']);
			$text .= "<div class='row'><div class='col-7'>Наименование Товара</div><div class='col-2'>Количество</div><div class='col-2'>Стоимость</div><div class='col-1'></div>";
			foreach ($basket_array as $id) {
				 $text .= "<div class='col-7'>".$id['goodname']."</div><div class='col-2'>".$id['counts']."</div><div class='col-2'>".$id['price']."</div><div class='col-1'><form method='post' action='index.php?c=basket&act=del'><button type='submit' name='idbasket' value=".$id['id'].">X</button></form></div>" ;
				 $sumpricegood += $id['counts'] * $id['price'];
			}
			$text .= "<div class='col-9'>Общая стоимость в корзине</div><div class='col-2'>".$sumpricegood."</div></div>";
			$text .= "<div class='col-12'><br></div><div class='col-auto'><form method='post' action='index.php?c=order&act=add'><div class='form-row'><div class='col-4'><label for='inputName1'>ФИО</label><input class='form-control' type='text' id='inputName1' name='username' placeholder='Имя Фамилия'></div><div class='col-4'><label for='inputEmeil1'>Email</label><input type='email' class='form-control' id='inputEmeil1' name='useremail' placeholder='Емеил'></div> <div class='col-4'><label for='inputTel1'>Телефон</label><input class='form-control' type='text' id='inputTel1' name='usertel' placeholder='Телефон'></div>  </div><div class='form-row'>
			<div class='col-12'>Адрес доставки</div> 
			<div class='col-2'> <label for='inputAddress1'>Город</label><input type='text' class='form-control' name='usercity'  placeholder='Город'>	</div>
			<div class='col-4'> <label for='inputAddress2'>Улица</label><input type='text' class='form-control' name='userstreet'  placeholder='Улица'></div>
			<div class='col-2'> <label for='inputAddress3'>Дом</label><input type='text' class='form-control' name='userhouse'  placeholder='дом'></div>
			<div class='col-2'> <label for='inputAddress4'>Корп./Стр.</label> <input type='text' class='form-control' name='userboild'  placeholder='корпус/строение'></div>
			<div class='col-2'> <label for='inputAddress5'>Квартира</label> <input type='text' class='form-control' name='userkv' placeholder='кв'></div>
		  </div><div class='col-12'><br></div><button type='submit' class='btn btn-primary mb-2' name='idorder' value=".$_SESSION['order_id'].">Заказать</button></div></form></div>";

		} else{

			$text = "<div class='row'>Корзина пуста.</div>";
		
		}
		$this->content = $this->Template('v/v_basket.php', array('text' => $text));	
	}

	public function action_del()	{
		$this->title .= '::Корзина:Удаление товара';
		$delbasket = new Basket();
		if($delbasket->basketdel($_POST["idbasket"])){
			$text .= "<div class='col-12'>Товар успешно удален<form method='post' action='index.php?c=basket&act=view'><div class='form-group'><button class='btn btn-primary' type='submit'>Вернуться в Корзину</button></div></form></div>";
		}
		$this->content = $this->Template('v/v_basket.php', array('text' => $text));	 		
	}


}