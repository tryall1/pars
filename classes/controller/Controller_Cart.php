<?php

class Controller_Cart extends Controller
{
	function __construct()
	{
		$this->model = new model_Cart();
		parent::__construct();
	}
	
	function actionIndex()
	{
		$this->view->setData(array(
			'title'=>"Корзина",
			'data'=>'test',
			'menu'=>model_Categories::getAllCat(),
			'session'=>$_SESSION
		));
		
		$this->view->generate('cart');
	}
	
	function actionAdd(){
		$product_id = (int)$this->getRoutes(3);
		$this->model->add_Product($product_id);

		/*$file=fopen("test.txt", "w+");
		fwrite($file, "��������");*/
	}

    function actionClear(){
        $this->model->Clear();
    }
}