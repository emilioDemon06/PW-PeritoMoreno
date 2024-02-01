<?php


	/**
	 * clase modelo para llamar a la base de datos y listar todas las noticias
	 */
	class Noticia_DashboardModel extends DB
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public static function all()
		{
			$respuesta = DB::SQL("SELECT n.ID, n.Titulo, n.Copete, n.Contenido, n.Fecha, c.Nombre as Categoria, a.Nombre as Autor FROM noticia as n INNER JOIN categoria as c ON n.ID_Categoria = c.ID INNER JOIN autor as a ON n.ID_Autor = a.ID ");
			return $respuesta;
		}
		public static function oneNoticia($id)
		{
			$sql = "SELECT n.*, c.Nombre as Categoria, a.Nombre as Autor FROM noticia as n INNER JOIN  categoria as c ON n.ID_Categoria = c.ID INNER JOIN autor as a ON n.ID_Autor = a.ID WHERE n.ID = :id";
			$row = parent::query($sql, ['id' => $id]);
			return $row[0];
		}
		public static function categorias()
		{
			//categorias 
			$respuesta = DB::SQL("SELECT * FROM categoria");
			return $respuesta;
		}
		public static function autores()
		{
			//categorias 
			$respuesta = DB::SQL("SELECT * FROM autor");
			return $respuesta;
		}
		public static function saveNoticia($data)
		{
			$idSave = DB::insert("noticia",$data);
			return $idSave;
		}
		public static function updateNoticia($data,$id)
		{
			$respuesta = DB::update("noticia",$data,["ID" => $id]);
			return $respuesta;
		}
		public static function deleteNoticia($id)
		{
			$idDelete = DB::delete('noticia',['ID' => $id]);
			return $idDelete;
		}
	}
