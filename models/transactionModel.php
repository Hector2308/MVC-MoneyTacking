<?php  
	/**
	 * Clase del modelo Transaction
	 */
	class transactionModel extends AppModel
	{
		/**
		 * Constructor de la case
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * Obtiene todos los registro de transacciones existentes en la base de datos
		 * @return type
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT t.*,a.name AS nameaccount,c.name AS namecategory FROM transactions t INNER JOIN accounts a ON a.id=t.account_id INNER JOIN categories c ON c.id=t.category_id");
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
		 * Agrega una nueva transaccion 
		 * Obtiene los datos mediante un array
		 * @param type|array $data 
		 * @return type
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO transactions (account_id,category_id,description,date,amount) VALUES (:account_id,:category_id,:description,:date,:amount)");
			
			$query->bindParam(":account_id",$data['id_account']);
			$query->bindParam(":category_id",$data['id_category']);
			$query->bindParam(":description",$data['description']);
			$query->bindParam(":date",$data['date']);
			$query->bindParam(":amount",$data['amount']);

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
		 * Actualiza los datos de una transaccion
		 * Obtiene el Id de la transaccion
		 * @param type|array $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE transactions SET account_id=:account_id,category_id=:category_id,description=:description,date=:date,amount=:amount WHERE id=:id");
			
			$query->bindParam(":id",$data['id']);
			$query->bindParam(":account_id",$data['id_account']);
			$query->bindParam(":category_id",$data['id_category']);
			$query->bindParam(":description",$data['description']);
			$query->bindParam(":date",$data['date']);
			$query->bindParam(":amount",$data['amount']);

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
		 * Realiza la busqueda de la una transaccion mediante su Id
		 * @param type $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM transactions WHERE id=:id");
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

		/**
		 * Elimina una transaccion mediante el Id
		 * @param type $id 
		 * @return type
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM transactions WHERE id=:id");
			
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