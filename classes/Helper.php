<?php

class Helper
{
	/**
	 * @param $url
	 * @param int $stat
	 */
	public static function redirect($url, $stat = 301)
	{
		if (headers_sent())
			echo "<html><head><meta http-equiv='refresh' content='0; url=\"$url\"'></head><body></body></html>";
		else {
			header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
			header("Expires: Sat, 23 Nov 1978 05:00:00 GMT");
			header('Location: ' . $url, true, $stat);
		}
		exit;
	}

	/**
	 * @param $page
	 * @param $npages
	 * @param string $preurl
	 * @param string $posturl
	 * @return string
	 */
	public static function getPaginator($page, $npages, $preurl = '', $posturl = '')
	{

		$s = '';

		if ($npages > 1) {
			for ($i = 1; $i <= $npages; $i++) {
				$plus_page = $page + 5;
				$minus_page = $page - 5;

				if ($i == $page || ($i >= $minus_page && $i <= $plus_page) || ($i == $npages or $i == 1)) {
					$url = $preurl . $i . $posturl;
					$s .= '<li' . ($i == $page ? ' class="active"' : '') . '><a href="' . $url . '"' . ($i > 1 ? ' rel="nofollow"' : '') . '>' . $i . '</a> ';
				}


			}
		}
		return $s != '' ? '<ul class="pagination">' . $s . '</ul>' : '';
	}
}