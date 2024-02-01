<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Usuario_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		public static function all()
		{
			$respuesta = DB::SQL("SELECT us.ID, us.Nombre as NombreUs , us.Apellido, r.Nombre as NombreRol, us.Correo, us.is_activo FROM usuario as us INNER JOIN rol as r ON us.ID_Rol = r.ID WHERE us.ID_Rol != 1");
			return $respuesta;
		}
		public static function roles()
		{
			//Roles no activos 
			$respuesta = DB::SQL("SELECT * FROM rol WHERE is_activo != 0 ");
			return $respuesta;
		}
		public static function sectores()
		{
			//sectores 
			$respuesta = DB::SQL("SELECT * FROM sector");
			return $respuesta;
		}
		public static function save($data)
		{
			$idSave = DB::insert("usuario",$data);
			return $idSave;
		}
		public static function oneUser($id)
		{
			$sql = "SELECT us.ID,us.ID_Rol,us.Nombre, us.Apellido, r.Nombre as NombreRol, s.Lugar as Lugar, s.ID as IdLugar, us.Correo,us.Password, us.is_activo FROM usuario as us INNER JOIN rol as r ON us.ID_Rol = r.ID INNER JOIN sector as s ON us.ID_Sector = s.ID WHERE us.ID = :id";
			$row = parent::query($sql, ['id' => $id]);
			//$info = DB::SQL("SELECT us.ID,us.ID_Rol, us.Nick as NombreUser, r.Nombre as NombreRol, us.Correo,us.Password, us.is_activo FROM usuario as us INNER JOIN rol as r ON us.ID_Rol = r.ID WHERE us.ID = $id");
			return $row[0];
		}
		public static function updateUser($data,$id)
		{
			$respuesta = DB::update("usuario",$data,["ID" => $id]);
			return $respuesta;
		}
		public static function deleteUser($idUser)
		{
			$idDelete = DB::delete('usuario',['ID' => $idUser]);
			return $idDelete;
		}

	}