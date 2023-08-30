<?php

class Tramite extends Controllers
{
	

	public function index()
	{
		$data["page_name"] = "Perito Moreno";
		$data["page_title"] = "Tramites";
		$data["function_js"] = "Noticia.js";
		$this->Views->getView($this,"index",$data);
	}
}