<?php

/* @var $this yii\web\View */


?>
<div class="site-index">

<div class="jumbotron">
<h1>Parser 2</h1>

</div>

<div class="body-content">
<?php

//откуда будем парсить информацию
$content = file_get_contents('http://23met.ru/plist/mc');
if($content==false) 
	exit();
// Определяем позицию строки, до которой нужно все отрезать
$pos = strpos($content, '<div style="padding:0px 5px 5px 0;">');

//Отрезаем все, что идет до нужной нам позиции
$content = substr($content, $pos);

// Точно таким же образом находим позицию конечной строки
$pos = strpos($content, '<div id="ya-text">');

// Отрезаем нужное количество символов от нулевого
$content = substr($content, 0, $pos);



$content = explode('<div style="padding:0px 5px 5px 0;">', $content);
foreach ($content as $key => $value) {

$pos_cat = strpos($value, '<b>');
$cat_name = substr($value, $pos_cat);
$pos_cat = strpos($cat_name, '<a name=');
$cat_name = substr($cat_name, 0, $pos_cat);
$cat_name = strip_tags($cat_name);
// echo "Категория: $cat_name<br>$key<br>";
$a[$key] = $cat_name;
}

foreach ($content as $key => $value) {

$pos_cat = strpos($value, '<tbody>');
$cat_value = substr($value, $pos_cat);
$pos_cat = strpos($cat_value, '</tbody>');
$cat_value = substr($cat_value, 0, $pos_cat);
$content_value = explode('</td>', $cat_value);
foreach ($content_value as $key_value => $body_value) {
if ($pos_del = strpos($body_value, '<small>')) {
$body_value = substr($body_value, 0, $pos_del);
}
$body_value = strip_tags($body_value);

$b[$key][$key_value] = $body_value;
}


} 

$host="localhost"; 
$username="root";
$password="";
$database="parse2";
$table_products="products";
$table_categories="categories";

$connection = mysql_connect("$host", "$username", "$password") or die ("Unable to connect to server");
mysql_select_db("$database") or die ("Unable to select database");
$sql = "TRUNCATE TABLE `$table_products`";
mysql_query($sql);
$sql = "TRUNCATE TABLE `$table_categories`";
mysql_query($sql);
$yy = 0;
foreach($b as $base_key => $base_value) {
if ($base_key != 0) {
$sql = "INSERT INTO `categories` (`category_id`, `category_name`) 
VALUES ('".$base_key."','".$a[$base_key]."')";
mysql_query($sql);

echo $a[$base_key]; }
$y = 0;

echo '<table border="1">';
$i = 0;
foreach ($base_value as $key => $value) {
if ($i==0){
echo '<tr border="1">';
}
echo '<td>';
if ($i == 5 || $i == 6) {
$value = trim($value);
$value = str_replace(' ','',$value);
}
// echo $value;

$c[$i] = $value;
echo $c[$i];
echo '</td>';

if ($i == 6){
$yy++;

$sql = "INSERT INTO `products` (`product_id`, `product_category_id`, `product_name`, `product_size`, `product_stal`, `product_dop_size`, `product_gost`, `product_cost_opt`, `product_cost_rozn`) 
VALUES ('".$yy."','".$base_key."','".$c[0]."','".$c[1]."','".$c[2]."','".$c[3]."','".$c[4]."','".$c[5]."','".$c[6]."')";
if (mysql_query($sql)){
echo 'ok' . $yy;
} else {
echo 'nook' . $yy;
} 
echo '</tr>';
$i=0;
$y++;
} 
else {
$i++;
}
}
echo "</table>";
}

?>
</div>
</div>