<?php


/**
 * 
 */
class Error404 extends Controllers
{
	
	public function index()
	{
		$data["page_name"] = "404";
		$data["page_title"] = "Error 404";
		$this->Views->getView($this,'index',$data);
	}
}

   //se instancia a la vista error y al metodo, para poder hacer uso de esta
$index = new Error404();
$index->index();