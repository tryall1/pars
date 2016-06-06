<?php

class Auth
{
	const USERNAME = 'user';
	const USERPASS = 'pass';

	public static function check()
	{
		if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_PW'] != self::USERPASS || $_SERVER['PHP_AUTH_USER'] != self::USERNAME)
			self::authenticate();
	}

	public static function authenticate()
	{
		header('WWW-Authenticate: Basic realm="Authentication"');
		header('HTTP/1.0 401 Unauthorized');
		echo "Введите корректный логин и пароль для получения доступа к ресурсу \n";
		exit;
	}
}