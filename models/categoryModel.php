<?php  	
	/**
	 * Clase del modelo Category 
	 */
	class categoryModel extends AppModel
	{
		/**
		 * Constructor de la clase
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * Obtiene todos las categorias registradas en la base de datos
		 * @return type
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM categories ");
			$query->execute();
			$items = $query->fetchall();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/**
		 * Agrega un nuevo registro
		 * Obtiene los datos mediante un array
		 * @param type|array $data 
		 * @return type
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO categories (name) VALUES (:name )");			
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/**
		 * Actualiza los datos de una categoria
		 * Obtiene los datos mediante un array
		 * @param type|array $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE categories SET name=:name WHERE id=:id");		

			$query->bindParam(":id",$data['id']);	
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/**
		 * Obtieene los datos de una categoria
		 * Realiza la busqueda mediante el Id
		 * @param type $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM categories WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/**
		 * Elimina una categoria
		 * Lo elimina mediante el Id
		 * @param type $id 
		 * @return type
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM categories WHERE id=:id");		

			$query->bindParam(":id",$id);	

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>