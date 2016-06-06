<?php
/**
 * Cписок товаров в категории
 */
?>
<h1>Товары в категории</h1>

<table class="table table-striped table-hover">
<thead>
	<tr>
		<td>Наименование</td>
		<td>Размер</td>
		<td>Сталь</td>
		<td>Тонны</td>
		<td>Доп. размер</td>
		<td>ГОСТ</td>
		<td colspan="2">Цена, р/т</td>
		<td>Добавить в корзину:</td>
	</tr>
</thead>
<tbody>
<?
foreach($post as $key): ?>
  <tr id=<?=$key['product_id'];?>>
  <td><?=trim($key['product_name']);?></td>
  <td><?=trim($key['product_size']);?></td>
  <td><?=trim($key['product_stal']);?></td>
  <td><input type="text" class="ton" value="1"/></td>
  <td><?=trim($key['product_dop_size']);?></td>
  <td><?=trim($key['product_gost']);?></td>
  <td><?=trim($key['product_cost_opt']);?></td>
  <td><?=trim($key['product_cost_rozn']);?></td>
  <td><center><img src="/res/img/cart.png" onclick="add_cart(<?=trim($key['product_id']);?>)" width=40px height=40px/></center></td>
  </tr>
<? endforeach;?>
</tbody>
</table>