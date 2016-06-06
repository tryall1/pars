<?php

class Controller_404 extends Controller
{

	function actionIndex()
	{
		$this->view->setData('title', 'Плохой controller');
		$this->view->generate('404');
	}

}
