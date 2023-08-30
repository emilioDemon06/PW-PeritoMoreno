<?php


/**
 * Conexion a la base de datos
 */
class Conexion 
{
	
	private $conect;

	public function __construct()
	{
		$conectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
		try{
			$this->conect = new PDO($conectionString,DB_USER,DB_PASSWORD);
			$this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $e){
			$this->conect = "Error de conexión";
            echo "ERROR: " . $e->getMessage(); 
		}
	}
	public function conect(){
		return $this->conect;
	}
	public static function query($sql, $params = [])
	{
		$db = new Conexion();
		$link = (object)$db->conect();
		$link->beginTransaction();
		$query = $link->prepare($sql);


		//SI NO SE REALIZO UN QUERY
		if(!$query->execute($params)){
			$link->rollBack();
			$error = $query->errorInfo();
			throw new Exception($error[2]);
		}

		//MANEJO DEL TIPO DE QUERY
		// SELECT | INSERT | UPDATE | DELETE | ALTER TABLE

		if(strpos($sql, "SELECT") !== false){
			return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
		}elseif(strpos($sql, "INSERT") !== false){
			$id = $link->lastInsertId();
			$link->commit();
			return $id;
		}elseif (strpos($sql, "UPDATE") !== false) {
			$link->commit();
			return true;
		}elseif (strpos($sql, "DELETE") !== false){
			if($query->rowCount() > 0){
				$link->commit();
				return true;
			}
			$link->rollBack();
			return false; // no se borro nada 


		}else{
			//alteracion a la tabla
			$link->commit();
			return true;
		}

	}
}