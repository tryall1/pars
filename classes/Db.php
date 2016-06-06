<?php

class Db
{
	/**
	 * @static
	 * @var PDO
	 */
	private static $conn = null;

	private function __construct()
	{
	}

	private function __clone()
	{
	}

	/**
	 * @return PDO
	 */
	public static function getInst()
	{
		if (!self::$conn) {
			self::$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$conn;
	}

}