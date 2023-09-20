<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Rol_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		public static function all()
		{
			$respuesta = DB::SQL("SELECT ID, Nombre, is_activo FROM rol");
			return $respuesta;
		}

	}