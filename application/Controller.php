<?php 
	/**
	  * Clase AppController 
	  */ 
	abstract class AppController
	{
		protected $_view;

		/**
		 * Constructor de la clase
		 * @return type
		 */
		public function __construct()
		{
			$this->_view = new View(new Request);
		}

		/**
		 * Index
		 * @return type
		 */
		abstract function index();		

		/**
		 * Retorna un objeto del modelo requerido
		 * @param type $modelo 
		 * @return type
		 */
		protected function loadModel($modelo)
		{
			$modelo = $modelo."Model";
			$rutaModelo = ROOT."models".DS.$modelo.".php";

			if(is_readable($rutaModelo))
			{
				require_once($rutaModelo);
				$modelo = new $modelo;
				return $modelo;
			}
			else
			{
				throw new Exception("Error al cargar el modelo");
				
			}
		}

		/**
		 * Redirecciona hacia la vista requerida
		 * Crea la url del archivo
		 * @param type|array $url 
		 * @return type
		 */
		public function redirect($url = array())
		{
			$path = "";
			if ($url["controller"]) {
				$path .= $url["controller"];
			}

			if ($url["action"]) {
				$path .="/".$url["action"];
			}

			header("LOCATION: ".APP_URL.$path);
		}
	}
?>