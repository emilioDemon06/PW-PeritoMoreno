<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Categoria_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		public static function all_categorias()
		{
			$respuesta = DB::SQL("SELECT * FROM categoria");
			return $respuesta;
		}
		public static function oneCategoria($id)
		{
			$info = DB::SQL("SELECT * FROM categoria WHERE ID = $id");
			return $info[0];
		}
		public static function saveCategoria($data)
		{
			$idSave = DB::insert("categoria",$data);
			return $idSave;
		}
		public static function updateCategoria($data,$id)
		{
			$respuesta = DB::update("categoria",$data,["ID" => $id]);
			return $respuesta;
		}

	}