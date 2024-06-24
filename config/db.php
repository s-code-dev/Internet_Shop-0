<?php

class M_Db{
 
    private  $db_query = null;
    private $result = [];
    
    public static function db() {
        
    define('DB_DRIVER', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'cy86747_test4');//Myshop001
    define('DB_USER', 'root');
    define('DB_PASS', 'bjiax2014');
      
        try {
            $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
            $db = new PDO($connect_str, DB_USER, DB_PASS);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $db;
    }
    


}