<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public static function infoUser($idUser)
		{
			$usersInfo = DB::SQL("SELECT u.ID, r.Nombre as NombreRol, s.Lugar, s.Calle, s.Altura, u.Nombre, u.Apellido, u.FotoPerfil, u.Telefono, u.Correo, u.Facebook, u.Instagram FROM usuario as u INNER JOIN rol as r ON u.ID_Rol = r.ID INNER JOIN sector as s ON u.ID_Sector = s.ID WHERE u.ID = $idUser");

			return $usersInfo[0];
		}
		public static function oneUser($idUser)
		{
			$info = DB::listEqual("usuario", ['ID' => $idUser], 1);
			return $info;
		}
		public static function updateUser($data,$id)
		{
			$respuesta = DB::update("usuario",$data,["ID" => $id]);
			return $respuesta;
		}
		public static function infoSector()
		{
			$info = DB::SQL("SELECT * FROM sector");
			return $info;
		}

	}