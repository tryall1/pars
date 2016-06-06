<?php

class Controller_Main extends Controller
{
    private $page=0;

	function actionIndex()
	{
        $perpage=3;
		$this->view->setData(array(
			'title'=>"Продажа металла",
			'menu'=>model_Categories::getAllCat(),
            'posts' => model_Blog::getList($this->page, $perpage),
            'npages' => ceil(model_Blog::getCount() / $perpage),
            'page' => $this->page
		));
		
		$this->view->generate('main');
		
	}
}