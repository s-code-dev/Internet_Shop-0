<?php

    include_once 'DB.php';
    
    class Order {
 
        public function orderget($idorders){
            return DB::Select("SELECT basket.id, goods.goodname, basket.counts, goods.price FROM basket INNER JOIN goods ON  basket.idgoods = goods.id_goods WHERE basket.idorders = :idorders", ['idorders' => $idorders] );
        }
        
        public function orderclose($iduser){
            $idorder = null;
            DB::Update('UPDATE users SET lastidorder = :lastidorder WHERE (id = :id)',['lastidorder' => $idorder, 'id' => $iduser]);
        }
}
