<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Contacto_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}

        public static function infoUsers()
		{
			$respuesta = DB::SQL("SELECT us.ID, us.ID_Rol, r.Nombre as NombreRol, s.Lugar, s.Calle, s.Altura , us.Nombre, us.Apellido, us.FotoPerfil, us.Telefono, us.Correo, us.Facebook, us.Instagram FROM usuario as us INNER JOIN rol as r ON us.ID_Rol = r.ID INNER JOIN sector as s ON us.ID_Sector = s.ID");
			return $respuesta;
		}

	}