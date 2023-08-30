<?php

class Noticia extends Controllers
{
	

	public function index()
	{
		$data["page_name"] = "Noticia";
		$data["page_title"] = "Noticias";
		$data["function_js"] = "Noticia.js";
		$this->Views->getView($this,"index",$data);
	}
}