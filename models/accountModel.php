<?php  
	/**
	 * Clase del modelo Account 
	 */
	class accountModel extends AppModel
	{
		/**
		 * Contructor de la clase
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * Se obtiene todos las cuentas registradas
		 * @return array()
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM accounts");
			$query->execute();
			$items = $query->fetchall();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/**
		 * Agrega una nueva cuenta en la base de datos
		 * @param type|array $data 
		 * @return boolean
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO accounts (user_id,name) VALUES (:user_id,:name)");

			$defaultID = "1";
			$query->bindParam(":user_id",$defaultID);
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
		 * Actualiza los datos de una cuenta retistrada en la base de datos
		 * @param type|array $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE accounts SET name=:name WHERE id=:id");
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
		 * Realiza la busqueda de los datos de una cuenta mediante el id
		 * @param type $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}
	}
?>