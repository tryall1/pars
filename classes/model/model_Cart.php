<?php

class model_Cart extends Model
{
	function add_Product($id){
		session_start();
		if(isset($_SESSION['products'])) {
		//echo "lol";
			array_push($_SESSION['products'],$id); 
		}else{
			//echo "lol-false";
			$_SESSION['products']=array($id);
			var_dump($_SESSION);
		}
		return $_SESSION;
	}

    function Clear(){
        session_start();
        session_destroy();
       // var_dump($_SESSION);
    }
	
	 static public function getById($product_id){
        $conn=DB2::getDB();
        $query="select * from products where product_id=".$product_id;
        $conn=$conn->select($query);
        return $conn;
    }
}