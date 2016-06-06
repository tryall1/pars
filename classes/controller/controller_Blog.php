<?php

class Controller_Blog extends Controller
{
	private $page = 0;


	function __construct()
	{
		$this->model = new model_Blog();
		parent::__construct();
	}

	function actionIndex()
	{
		$perpage = 2;
		$this->view->setData(array(
			'title' => 'Тестовый список блогов',
			'h1' => 'Тестовый список блогов',
			'posts' => model_Blog::getList($this->page, $perpage),
			'npages' => ceil(model_Blog::getCount() / $perpage),
			'page' => $this->page
		));
		$this->view->generate('blog_list');
	}

	function actionPage()
	{
		$this->page = (int)$this->getRoutes(3);
		$this->actionIndex();
	}

	function actionRead()
	{
		try {
			$this->model->id = (int)$this->getRoutes(3);

			$post = $this->model->getById();

			if (!$post instanceof model_Blog)
				throw new Exception('Запись отсутствует.');

			$this->view->setData(array(
				'title' => $post->title,
				'h1' => $post->title,
				'post' => $post
			));
			$this->view->generate('blog_post');
		} catch (Exception $e) {
			$this->view->generate('404', $e->getMessage());
		}
	}

	function actionEdit()
	{
		Auth::check();
		$this->model->id = (int)$this->getRoutes(3);
		$post = $this->model->getById();

		if (!($post instanceof model_Blog))
			$post = new model_Blog();

		if (isset($_POST['action']) && $_POST['action'] == 'edit') {
			$result = $post->savePost();
			if ($result == true)
				Helper::redirect($post->getUrl());
		}

		$this->view->setData(array(
			'title' => $post->id ? 'Редактирование поста' : 'Добавление нового поста',
			'h1' => $post->id ? 'Редактирование поста' : 'Добавление нового поста',
			'post' => $post
		));
		$this->view->generate('blog_edit');
	}

}
