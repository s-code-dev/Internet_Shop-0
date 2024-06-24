<?php



include_once 'SQL.php';

class Admin extends SQL {

    public $order_id, $product_id, $user_id, $count, $status;

    public function OrderProduct() {

        return parent::SelectJoinAdmin();
    }
}
?>