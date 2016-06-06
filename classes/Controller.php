<?php

abstract class Controller
{

	public $model;
	public $view;

	private $routes;

	function __construct()
	{
		$this->view = new View();
	}

	/**
	 * @param array $routes
	 */
	function setRoute(array $routes)
	{
		$this->routes = $routes;
	}

	/**
	 * @param $key
	 * @return bool
	 */
	function getRoutes($key)
	{
		if (!isset($this->routes[$key]))
			return false;
		return $this->routes[$key];
	}

	/**
	 * @return mixed
	 */
	abstract function actionIndex();
}
