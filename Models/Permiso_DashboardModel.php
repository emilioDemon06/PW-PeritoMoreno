<?php


	/**
	 * clase modelo para llamar a la base de datos a permisos
	 */
	class Permiso_DashboardModel extends DB
	{
		
		public function __construct()
		{
			parent::__construct();
		}
        public static function paginas()
        {
            $paginas = DB::SQL("SELECT * FROM pagina WHERE Activo != 0 ");
            return $paginas;
        }
        public static function permisosByRoles($idRol)
        {
            $permosoByRol = DB::SQL("SELECT * FROM permiso WHERE ID_Rol = {$idRol} ");
            return $permosoByRol;
        }
        public static function roles($idRol)
        {
            $rol = DB::SQL("SELECT * FROM rol WHERE ID = {$idRol} ");
            return $rol[0];
        }
        public static function deletePermisos($idRol)
        {
            return DB::SQL("DELETE FROM permiso WHERE ID_Rol = {$idRol}");
        }
        public static function insertPermisos($data)
        {
            return DB::insert('permiso',$data);
        }
    }