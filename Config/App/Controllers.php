<?php

/**
 Llamar a los modelos por medio de este controlador 
 */
class Controllers
{
	

	public function __construct()
	{
		$this->Views = new Views();
		$this->cargarModel();

	}


	public function cargarModel()
	{
		$model = get_class($this)."Model";
		$ruta = "Models/".$model.".php";

		if (file_exists($ruta)) {
			require_once $ruta;
			$this->model = new $model(); 
		}
	}	
}