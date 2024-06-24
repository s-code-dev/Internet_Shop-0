<?php



include_once 'SQL.php';

class Basket extends SQL {

    public $order_id, $product_id, $user_id, $count, $status;

    public function getBasket($user_id) {

        return parent::SelectJoin('basket', 'goods', 'product_id', 'id', 'user_id', $user_id);
    }

    public function addProduct($product_id, $user_id, $count) {

        $object = [
            'product_id' => $product_id,
            'user_id' => $user_id,
            'count' => strip_tags($count)
        ];
        
        parent::Insert('basket', $object);
        return 'Товар успешно добавлен в корзину!';
    }

    public function removeProduct($orderId) {
        parent::Remove('basket', $orderId);
    }


    public function toOrder($orderId){
        parent::addOrder($orderId);
       
        
      }
}
?>