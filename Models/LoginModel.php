<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class LoginModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		public static function login($email, $pass)
		{
			$sql = "SELECT * FROM usuario WHERE Correo = :email AND Password = :password LIMIT 1";
			
			return ($rows = parent::query($sql,['email'=>$email,'password'=>$pass])) ? $rows[0] : [];
		
		}

		public static function login2($email)
		{
			$sql = "SELECT * FROM usuario WHERE Correo= :email LIMIT 1";
			
			return ($rows = parent::query($sql,['email'=>$email])) ? $rows[0] : [];
		
		}
		public static function updateEstado($data, $id){
			$respuesta = DB::update("usuario",$data,["ID" => $id]);
			return $respuesta;
		}

	}