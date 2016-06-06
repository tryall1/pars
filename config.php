<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'parse2');


spl_autoload_register(function ($class) {
	$dirs = explode("_", $class);
	$dirs[count($dirs) - 1] = $class . '.php';
	$filename = "classes/" . implode("/", $dirs);
	if (!file_exists($filename))
		throw new Exception('Отсутствует класс: ' . $filename);
	require_once($filename);
});