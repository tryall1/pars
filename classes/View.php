<?php

class View
{
	public $template = 'layout.php';
	private $data = array();

	/**
	 * @param string $content
	 */
	function generate($content)
	{
		extract($this->data);
		include 'views/' . $this->template;
	}

	/**
	 * @param $data
	 * @param null $value
	 */
	function setData($data, $value = null)
	{
		if (is_array($data))
			foreach ($data as $key => $value)
				$this->data[$key] = $value;
		else
			$this->data[$data] = $value;
	}
}
