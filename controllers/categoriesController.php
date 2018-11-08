<?php  
	/**
	 * Clase Categories Controller
	 */
	class categoriesController extends AppController
	{
		/**
		 * Constructor de la clase
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * Inicializa un objeto de tipo Category 
		 * Obtiene la lista de Categorias
		 * Asigna el titulo de la pagina
		 * Llama el archivo index.phtml para visualizarlo
		 * @return type
		 */
		public function index()
		{
			$category = $this->loadModel("category");
			$this->_view->categories = $category->GetAll();
			$this->_view->title="Categorias";
			$this->_view->renderizar("index");
		}

		/**
		 * Agregar una nueva categoria
		 * Crear un objeto de tipo Category
		 * Asigna el titulo de la pagina
		 * Renderiza la vista add.phtml
		 * Si obtiene datos mediante POST crea un objeto de tipo Category y llama al metodo Add para agregar una nueva categoria
		 * Redirecciona a la vista index.phtml
		 * @return type
		 */
		public function add()
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->add($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$this->_view->title="Nueva Categoria";
			$this->_view->renderizar("add");
		}

		/**
		 * Actualiza una categoria 
		 * Obtiene el Id de la categoria 
		 * Realizar la busqueda de la categoria para imprimir los datos en la vista
		 * Renderiza la vista update.phtml
		 * Si detecta la entrada de datos mediante POST crea un objeto de tipo Category y llama al metodo Update para actualizar la categoria
		 * Redirecciona a la vista index.phtml
		 * @param type|null $id 
		 * @return type
		 */
		public function update($id=null)
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->Update($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$modelCategory = $this->loadModel("category");
			$this->_view->category=$modelCategory->Find($id);
			$this->_view->title="Actualizar Categoria";
			$this->_view->renderizar("update");
		}

		/**
		 * Eliminar una categoria
		 * Crea un objeto de tipo Category
		 * Realiza la busqueda del elemento que se desea eliminar
		 * Si encuenta un resultado llama al metodo Delete para elminar el registro
		 * Redirecciona a la vista index.phtml 
		 * @param type|null $id 
		 * @return type
		 */
		public function delete($id=null)
		{
			$modelCategory = $this->loadModel("category");
			$category=$modelCategory->Find($id);

			if($category)
			{
				$modelCategory->Delete($id);
				$this->redirect(array("controller"=>"categories"));
			}
		}
	}
?>