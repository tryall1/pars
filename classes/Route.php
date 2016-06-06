<?php

class Route
{
	static function start()
	{
		$controller = 'Main';
		$action = 'index';

		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if (!empty($routes[1]))
			$controller = $routes[1];

		if (!empty($routes[2]))
			$action = $routes[2];

		$controller_name = 'controller_' . ucfirst($controller);
		$action_name = 'action' . ucfirst($action);

		try {
			$controller = new $controller_name;
			$controller->setRoute($routes);

			if (!method_exists($controller, $action_name)) {
				throw new Exception('Отсутствует метод: ' . $action);
			}


		} catch (Exception $e) {
			$controller = new controller_404();
			$action_name = 'actionIndex';
		}

		$controller->$action_name();

	}

}
