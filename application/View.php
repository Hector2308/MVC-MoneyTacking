<?php  
	/**
	 * Clase View
	 */
	class View
	{
		private $_controlador;

		/**
		 * Constructor de la clase
		 * @param Request $peticion 
		 * @return type
		 */
		public function __construct(Request $peticion)
		{
			$this->_controlador = $peticion->getController();
		}

		/**
		 * Renderiza la vista solicitada
		 * Valida si la vista solicitada existe
		 * @param type $vista 
		 * @param type|bool $item 
		 * @return type
		 */
		public function renderizar($vista,$item = false)
		{
			$_layoutParams = array(
				"ruta_css"=>APP_URL."views/layout/".DEFAULT_LAYOUT."/css",
				"ruta_img"=>APP_URL."views/layout/".DEFAULT_LAYOUT."/img",
				"ruta_js"=>APP_URL."views/layout/".DEFAULT_LAYOUT."/js"
			);

			$rutaVista = ROOT."views".DS.$this->_controlador.DS.$vista.".phtml";

			if(is_readable($rutaVista))
			{
				include_once(ROOT."views".DS."layout".DS.DEFAULT_LAYOUT.DS."header.php");
				include_once($rutaVista);
				include_once(ROOT."views".DS."layout".DS.DEFAULT_LAYOUT.DS."footer.php");
			}
			else
			{
				throw new Exception("Vista no encontrada");
				
			}
		}
	}
?>