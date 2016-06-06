<?
//session_start();
//echo count($_SESSION['products']);

include("Db2.php");
if(isset($_GET['id'])){
$id=trim($_GET['id']);
$conn=Db2::getDB();
$query="SElECT product_cost_opt, product_cost_rozn from products where product_id=".$id;
$conn=$conn->select($query);
echo trim($conn[0]['product_cost_rozn'])."<br>";
echo trim($conn[0]['product_cost_rozn']);
//var_dump($conn);
}