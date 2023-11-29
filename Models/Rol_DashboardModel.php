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
		public static function allRol()
		{
			$respuesta = DB::SQL("SELECT ID, Nombre, is_activo FROM rol");
			return $respuesta;
		}
		public static function saveRol($data)
		{
			$idSave = DB::insert("rol",$data);
			return $idSave;
		}
		public static function deleteRol($idRol)
		{
			$idDelete = DB::delete('rol',['ID' => $idRol]);
			return $idDelete;
		}
		public static function updateRol($data,$id)
		{
			$respuesta = DB::update("rol",$data,["ID" => $id]);
			return $respuesta;
		}
		public static function oneRol($id)
		{
			$info = DB::SQL("SELECT ID, Nombre, is_activo FROM rol WHERE ID = $id");
			return $info[0];
		}

	}