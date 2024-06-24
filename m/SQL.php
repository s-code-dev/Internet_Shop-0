<?php
	
	include_once 'config/db.php';

	class SQL extends M_Db {
		
		private static $instance;
		private $db;
	
        public function Select($table, $id=false){ 

            if ($table and $id) {
                $query = "SELECT * FROM goods WHERE id=?";
                $q = $this->db()->prepare($query);
                $q->execute(array($id));
                return $q->fetch(PDO::FETCH_ASSOC);
            } else {
                $query = "SELECT * FROM  $table";
                $q = $this->db()->prepare($query);
                $q->execute();
                return $q->fetchAll(PDO::FETCH_ASSOC);
            }
            
        
         }
        public function SelectJoin($table1, $table2, $t1key, $t2key, $par1 = false, $par2 = false) {

		        $query = "SELECT * FROM " . $table1 . " AS T1 INNER JOIN " . $table2 . " AS T2 ON T1. " . $t1key . " = T2. " . $t2key . " WHERE T1. " . $par1 . " = " . $par2;

                $q = $this->db()->prepare($query);
                $q->execute();

             if ($q->errorCode() != PDO::ERR_NONE) {
                $info = $q->errorInfo();
                die($info[2]);
            }
                return $q->fetchAll();
         }
		//"SELECT order_id, product_id, count, title, price FROM basket AS T1 INNER JOIN products AS T2 ON T1.product_id = T2.id WHERE T1.user_id = " . $_SESSION["user_id"]
		
		public function Insert($table, $object) {
			
			    $columns = array();
			
			 foreach ($object as $key => $value) {
			
				$columns[] = $key;
				$masks[] = ":$key";
				
			 if ($value === null) {
					$object[$key] = 'NULL';
				}
			}
			
			    $columns_s = implode(',', $columns);
			    $masks_s = implode(',', $masks);			
			    $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
			
			    $q = $this->db()->prepare($query);
			    $q->execute($object);
			
			 if ($q->errorCode() != PDO::ERR_NONE) {
				$info = $q->errorInfo();
			    die($info[2]);
			}
			
			    return $this->db()->lastInsertId();
		}
		
		public function Update($table, $object, $where) {
			
			    $sets = array();
			 
			 foreach ($object as $key => $value) {
				
				$sets[] = "$key=:$key";
				
			 if ($value === NULL) {
					$object[$key]='NULL';
				}
			 }
			 
			    $sets_s = implode(',',$sets);
			    $query = "UPDATE $table SET $sets_s WHERE $where";

			    $q = $this->db()->prepare($query);
			    $q->execute($object);

			 if ($q->errorCode() != PDO::ERR_NONE) {
				$info = $q->errorInfo();
				die($info[2]);
			}
			
			    return $q->rowCount();
		}
		
		
		public function Delete($table, $where) {
			
			    $query = "DELETE FROM $table WHERE $where";
			    $q = $this->db()->prepare($query);
			    $q->execute();
			
			 if ($q->errorCode() != PDO::ERR_NONE) {
				$info = $q->errorInfo();
				die($info[2]);
			}
			
			    return $q->rowCount();
		}

        public function Remove($table, $where) {

                $query = "DELETE FROM $table WHERE order_id = $where";
                $q = $this->db()->prepare($query);
                $q->execute();

             if ($q->errorCode() != PDO::ERR_NONE) {
                $info = $q->errorInfo();
                die($info[2]);
            }

                return $q->rowCount();
        }
		public function addOrder($orderId) {
			    // $order_id='id_user_order';

			    // $query = "INSERT INTO orders ($order_id) VALUES ($destination)";
			    // $q = $this->db()->prepare($query);
				// $q->execute();
				$query = "UPDATE basket SET status = REPLACE(status, 0, 2 ) WHERE user_id=? "  ;
			    $q = $this->db()->prepare($query);
		 		$q->execute(array($orderId));

	}

	// public function SelectJoinAdmin($basket, $users, $orders){
	// 	       $query = "SELECT * FROM " . $orders . " AS T1 INNER JOIN " . $basket . "AS T2 ON T1.id_user_order = T2.user_id INNER JOIN  ".$users. " AS T3 ON T2.user_id= T3.id " ;
	// 	       $q = $this->db()->prepare($query);
	// 		   $q->execute();
	// 		   return $q->fetchAll();
	// }
	 public function SelectJoinAdmin(){
	 	 	       $query = "SELECT users.name, users.telefone, goods.title, goods.price, basket.count, goods.description FROM `basket` LEFT JOIN `users` ON basket.user_id = users.id  LEFT JOIN `goods` ON basket.product_id = goods.id WHERE basket.status = 2  "   ;
			       $q = $this->db()->prepare($query);
				   $q->execute();
				   return $q->fetchAll();
					   
				}
	
}
 ?>