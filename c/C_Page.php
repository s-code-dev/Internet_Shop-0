<?php
include_once 'm/Product.php';
include_once "m/models.php";
include_once 'm/user.php';
include_once 'm/Basket.php';
include_once 'm/Admin.php';
// spl_autoload_register(function ($classnam){
// 	include_once("m/$classnam.php");
// });

/**
 * 
 * передаем данные моделей
 * в нем бужут методы по редактированию контента
 * здесь будут две страницы редактирования и основная страница
 * 
 */

class C_Page extends C_Base{


    public function action_index(){//создаем метод котороый будет создавать контент
        
        //запускаем наш шаблонизатор
        $product_object = new Product();
        $catalog = $product_object->getAllProducts();

        $this->title .= '';
        $this->content=$this->Template('v/v_index.php',array('catalog' => $catalog));
        if($this->isPost()){
            $this->ID.= $_POST['name'];
        $this->content = $this->Template('v/v_index.php', array('ID' => $this->ID));

        }
    }
    //создаем метод котороый будет создавать контент
    //и запускать шаблонизатор который заполняет шаблон с версткой
    // $this->title .="";
    public function action_content(){

        $text = text_get();//текс бурется из файла с момощью метода text_get 
        // который находится в папке m model.php
        // $today=data();
        //запускаем наш шаблонизатор
        $this->content=$this->Template('v/v_content.php',array('text'=>$text));
    }


    //создаем метод котороый будет создавать контент
    //и запускать шаблонизатор который заполняет шаблон с версткой
    public function action_edit(){

        $this->title .="";
        if($this->isPost())
        {
            text_set($_POST['text']);
            header('location: index.php?c=page&act=content');
            exit();
        }
        $text = text_get();
            $this->content = $this->Template('v/v_edit.php', array('text' => $text));		
        }
    
// public function action_catalog() {
			
//         $product_object = new Product();
//         $catalog = $product_object->getAllProducts();

//         $this->title .= '';
//         $this->content = $this->Template('v/v_catalog.php', array('catalog' => $catalog));
//     }

    public function action_product() {
        if($_GET['id']){
            $id=$_GET['id'];
        }    

        $product_object = new Product();
        $product = $product_object->getProduct($id);
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = false;
        }

        $this->title .= '';
        $this->content = $this->Template('v/v_product.php', array('product' => $product, 'user_id' => $user_id));

        if($this->isPost()) {
            $new_basket = new Basket();
            $result = $new_basket->addProduct($product['id'], $user_id, $_POST['count']);
            $this->content = $this->Template('v/v_product.php', array('product' => $product, 'user_id' => $user_id, 'text' => $result));
        }
    }

    public function action_basket() {
        
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = false;
        }

        $basket_object = new Basket();
        $basket = $basket_object->getBasket($user_id);

        $this->title .= '';
        $this->content = $this->Template('v/v_basket.php', array('products' => $basket));

        if($_POST['order']) {
            $orderId = $_POST['order'];
            $basket_object->removeProduct($orderId);
            $this->content = $this->Template('v/v_basket.php', array('products' => $basket));
            header('Location: index.php?c=page&act=basket');
        }
        if($_POST['order_id']) {
        $orderId = $_POST['order_id'];
        $basket_object->toOrder($orderId);
        $this->content = $this->Template('v/v_basket.php', array('text' => "Заказ выполнен.Ждите звонка менеджера" ));
            }
        
        
    }
        //создаем метод котороый будет создавать контент
        //запускаем наш шаблонизатор
    public function action_admin($id){

        $product_object = new Admin();
        $productOrder = $product_object->OrderProduct($id);
    
        $this->title .= '';
        $this->content=$this->Template('v/v_admin.php',array('adminorder' => $productOrder));
    
        }
    }