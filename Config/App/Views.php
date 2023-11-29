<?php


/**
 Llamar las vistas por medio de este controlador 
 */
class Views 
{
	
	public function getView($Controller,$View,$data=[]){

		foreach ($data as $key => $value) {
			$$key = $value;
		}

		$Controller = get_class($Controller);

		if ($Controller == "Home") {
			$view = "Views/".$View.".php";
		}else{
			$view = "Views/".$Controller."/".$View.".php";
		}
		require_once $view;

	}

}