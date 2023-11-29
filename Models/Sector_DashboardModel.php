<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Sector_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		public static function all()
		{
			$respuesta = DB::SQL("SELECT * FROM sector");
			return $respuesta;
		}
		public static function oneSector($id){
			$sql = "SELECT * FROM sector WHERE ID = :id";
			$row = parent::query($sql, ['id' => $id]);
			return $row[0];
		}
		public static function save($data)
		{
			$idSave = DB::insert("sector",$data);
			return $idSave;
		}
		public static function updateSector($data, $id)
		{
			$respuesta = DB::update("sector",$data,["ID" => $id]);
			return $respuesta;
		}
		public static function deleteSector($id)
		{
			$idDelete = DB::delete('sector',['ID' => $id]);
			return $idDelete;
		}

    }