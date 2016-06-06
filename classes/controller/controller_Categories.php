<?
class Controller_Categories extends Controller
{
public $data;

	function __construct()
	{
		$this->model = new model_Categories();
		parent::__construct();
	}
	
	function actionIndex()
	{
        $this->view->setData(array(
            'title'=>"Список категорий",
            'cat'=>"категории",
            'menu'=>model_Categories::getAllCat()
        ));
		/*$this->view->setData('title', array(
            'id'=>model_Categories::getAllCat()
        ));*/
		$this->view->generate('categories');
	}

    function actionView(){
       // try {
            $category_id = (int)$this->getRoutes(3);

            $post = $this->model->getById($category_id);

            //if (!$post instanceof model_Categories)
                //throw new Exception('Категория отсутствует.');

            $this->view->setData(array(
                'post'=>$post,
				'menu'=>model_Categories::getAllCat()
            ));

            $this->view->generate('Categories_list');
       // } catch (Exception $e) {
            //$this->view->generate('404', $e->getMessage());
            //$this->view->generate('Categories_list');
       // }
    }
}