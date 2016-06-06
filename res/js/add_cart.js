function add_cart(id){
    $.ajax({
        url: "/cart/add/"+id,
        success: function(data){
            //alert( "Прибыли данные: " + data );
            col=<?php count($_SESSION['products']);?>;
				
				
				col1=$('li.corzine>a').text();
            col=parseInt(col1.replace(/\D+/g,""));
            col++;
            $('li.corzine>a').text("Товаров в корзине("+col+")");
            }
});
}