<?php  
	/**
	 * Calse Modelo general
	 */
	class AppModel
	{
		protected $_db;

		/**
		 * Constructor
		 * Crea una instancia de la base de datos
		 * @return type
		 */
		public function __construct()
		{
			$this->_db = new Database();
		}
	}
?>