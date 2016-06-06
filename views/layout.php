<? session_start(); ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="cmpek">
	<title><?= htmlspecialchars($title) ?></title>
	<script src="/res/js/jquery.min.js"></script>
	<script type="text/javascript">
		function add_cart(id){
			$.ajax({
			url: "/cart/add/"+id,
			success: function(data){
				col=<?=count($_SESSION['products']);?>;
				col1=$('li.corzine>a.cart').text();
				col=parseInt(col1.replace(/\D+/g,""));
				col++;
				$('li.corzine>a.cart').text("Товаров в корзине("+col+")");
		}
		});
        }

        function clear_cart(){
            $.ajax({
                url: "/cart/clear/",
                success: function(data){
                    col=0;
                    $('li.corzine>a.cart').text("Товаров в корзине("+col+")");
                }
            });
        }

        function get_price(id,td,cof){
            $.ajax({
                url: "/classes/test.php?id="+id,
                success: function(data){
                    opt_rozn=data.split("<br>");
                    price1_nach=(opt_rozn[0]);
                    price2_nach=(opt_rozn[1]);
                    ($(td[6]).text(price1_nach*cof));
                    ($(td[7]).text(price2_nach*cof));
                }
            });
        }

        $(document).ready(function()
        {
            $("input.ton").click(function(){
                $(this).val('');
            });


        $('input').on('input keyup', function(e) {
            cof=$(this).val(); //коэфициент
            tr=(($(this).parent()).parent());
            val=$(tr).attr('id');
            td=tr.children();
            get_price(val,td,cof);
        });
        });

	</script>


	<link rel="stylesheet" type="text/css" href="/res/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/res/css/style.css"/>
	
	<!--[if lt IE 9]>
	<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Навигация</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--<a class="navbar-brand" href="/">Парсер</a>-->
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="/">Главная</a></li>
				<li id="right" class="corzine">
					<a href="cart" class="cart">Товаров в корзине:(<?=count($_SESSION['products']);?>)</a>

                    <a href="#" onclick="clear_cart();" class="cart-clear"> <span> <img src="/res/img/clear.png"/>Очистить</span></a>
				</li>
				
				
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-lg-9">
			<?php include 'views/' .$content.'.php'; ?>
		</div>
		<div class="col-md-3">
			<div class="well">
			<h3>Категории</h3>
			
			<? 
				 foreach ($menu as $men): ?>
					<a href=<?= "/categories/view/".$men['category_id'];?> > <?=$men['category_name'];?> </a><br/>
				 <? endforeach; ?>
			
			</div>
		</div>
	</div>
	<hr>
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>Продажа металла &copy; 2016</p>
			</div>
		</div>
	</footer>
</div>
<script type="text/javascript" src="/res/js/jquery.min.js"></script>
<script type="text/javascript" src="/res/js/bootstrap.min.js"></script>
</body>
</html>