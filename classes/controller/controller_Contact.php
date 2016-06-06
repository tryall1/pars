<?php

class Controller_Contact extends Controller
{

	function actionIndex()
	{
		$this->view->setData('title', 'Контакты');
		$this->view->setData('h1', 'Контакты');
		$this->view->generate('contact');
	}

}
