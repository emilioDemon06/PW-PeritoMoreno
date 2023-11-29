<?php

/**
 * clase automatizada para hacer consultas rapidas
 */
class DB extends Conexion
{	

	public static function consultSql($query)
	{
		$link = new Conexion();
		$link = $link->conect();
		$resultado = $link->query($query);
		$array = [];

		while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
			$array[] = $registro; 
		}
		$resultado->closeCursor();
		return $array;

	}


	/* ################################*/
	/* Consultar de forma plana un sql */
	/* ################################*/
	public static function SQL($query)
	{
		$resultado = self::consultSql($query);
		return $resultado;
	}

	/* ##########################################*/
	/* listar regostro/os desde la base de datos */
	/* ##########################################*/

	public static function listEqual($table, $params=[], $limit=null)
	{
		
		$cols_values = "";
		$limits = "";

		//si los parametros de la consulta tienen datos
		if (!empty($params)) {
			$cols_values .= "WHERE";
			foreach ($params as $key => $value) {
				$cols_values .= " {$key} = :{$key} AND";
			}
			//elimina el and del string $cols_values
			$cols_values = substr($cols_values, 0,-3);	
		}

		//si hay un limite
		if ($limit !== null) {
			$limits = " LIMIT {$limit}";
		}

		//query
		$stmt = "SELECT * FROM $table {$cols_values} {$limits}";

		//call base de datos query
		if (!$rows = parent::query($stmt,$params)) {
			return false;
		}
		return $limit === 1 ? $rows[0] : $rows;
		

	}
	/* ############################################################*/
	/* listar regostro/os desde la base de datos por medio de join */
	/* ############################################################*/
	public static function join($table1,$table2,$val1,$val2, $params=[], $limit=null)
	{
		
		$cols_values = "";
		$limits = "";

		//si los parametros de la consulta tienen datos
		if (!empty($params)) {
			$cols_values .= "WHERE";
			foreach ($params as $key => $value) {
				$cols_values .= " {$key} = :{$key} AND";
			}
			//elimina el and del string $cols_values
			$cols_values = substr($cols_values, 0,-3);	
		}

		//si hay un limite
		if ($limit !== null) {
			$limits = " LIMIT {$limit}";
		}

		//query
		$stmt = "SELECT * FROM $table1
				INNER JOIN $table2 ON
				$table1.$val1 = $table2.$val2
				 {$cols_values} {$limits}";

		//call base de datos query
		if (!$rows = parent::query($stmt,$params)) {
			return false;
		}
		return $limit === 1 ? $rows[0] : $rows;
		

	}

	/* ############################################*/
	/* insertar regostro/os desde la base de datos */
	/* ############################################*/

	public static function insert($table, $params=[])
	{
	
		$cols = "";
		$placeholders = "";

		foreach ($params as $key => $value) {
			$cols .= " {$key} ,";
			$placeholders .= " :{$key} ,";
		}
		$cols = substr($cols,0,-1);
		$placeholders = substr($placeholders,0,-1);

		$stmt = "INSERT INTO {$table} ({$cols}) VALUES ({$placeholders})";


		if ($id = parent::query($stmt,$params)) {
			return $id;
		}else{
			return false;

		}
		

	}


	/* ##############################################*/
	/* actualizar regostro/os desde la base de datos */
	/* ##############################################*/

	public static function update($table, $params=[], $id=[])
	{
		
		$cols = "";
		$placeholders = "";

		foreach ($params as $key => $value) {
			$placeholders .= "{$key} = :{$key} ,";
		}
		$placeholders = substr($placeholders,0,-1);


		if (count($id) > 1) {
			foreach ($id as $key => $value) {
				$cols .= " $key = :$key AND";
			}
			//elimina el and del string $cols_values
			$cols = substr($cols, 0,-3);	
		}else{
			foreach ($id as $key => $value) {
				$cols .= " $key = :$key";
			}
		}	

		$stmt = "UPDATE $table SET $placeholders WHERE $cols";
		if (!parent::query($stmt,array_merge($params,$id))) {
			return false;
		}
		return true;

	}


	/* ##########################################*/
	/* borrar regostro/os desde la base de datos */
	/* ##########################################*/

	public static function delete($table, $params=[], $limit = 1)
	{

		$cols_values = "";
		$limits = "";

		if (!empty($params)) {
			$cols_values .= "WHERE";
			foreach ($params as $key => $value) {
				$cols_values .= " {$key} = :{$key} AND";
			}
			$cols_values = substr($cols_values, 0,-3);
		}

		if ($limit != null) {
			$limits = " LIMIT {$limit}";

		}

		$stmt = "DELETE FROM $table {$cols_values}{$limits}";

		if (!$row = parent::query($stmt, $params)) {
			return false;
		}

		return $row;


	}


}