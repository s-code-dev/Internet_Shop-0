<?php

spl_autoload_register(function ($classname){
	include_once("c/$classname.php");
});
	


$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = false;
}

if (isset($_GET['c'])) {
	if ($_GET['c'] == 'page') {
		$controller = new C_Page();
	} else if ($_GET['c'] == 'user') {
		$controller = new C_User();
	}else if ($_GET['c'] == 'admin') {
		$controller = new C_Admin();
	}else if ($_GET['c'] == 'basket') {
		$controller = new C_Basket();
	}
	
} else {
	$controller = new C_Page();
}

$controller->Request($action);