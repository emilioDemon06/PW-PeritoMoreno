<?php

class Validations
{
	/*===============================
	=      @var and array Pattern  =
	===============================*/
	
	/**
	 *
	 * @var array $pattern
	 *
	 */
	public $patterns = array(
		'email' => '[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]+$',
		'text'	=> '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
		'tel'	=>	'[0-9+\s()-]+',
		'int'	=>	'[0-9]+',
		'word'	=>	'[\p{L}\s]+',
		'alphanum'	=>	'[\p{L}0-9]+',
		'alpha'	=>	'[\p{L}]+'

		);
	
	public $errors = array();
	/**
	 * @param string $name
	 * @return $this
	 *
	 */
	public function name($name)
	{
		$this->name = $name;
		return $this;
	}
	/**
	 *
	 * capturar el valor del campo
	 *@param string $name
	 *@return $this
	 */
	public function value($value)
	{
		$this->value = $value;
		return $this;
	}









	/*===============================
	=      @function Pattern       =
	===============================*/

	public function pattern($name)
	{
		if ($name == 'array') {

			//validar si la variable es o no un array
			if (!is_array($value)) {
				$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n "); 
			}
		}else{

				//inicio de una exprecion regular
				$regex = '/^('.$this->patterns[$name].')$/u';
				if ($this->value != '' && !preg_match($regex,$this->value)) {
					$this->errors[] = nl2br("El formato del campo $this->name no es valido \n "); 
				}
			}
		return $this;//retorna la funcion
	}
	/**
	 *
	 * Pattern personalizado
	 *@param string $pattern
	 *@return $this
	 */
	
	public function customPatern($pattern)
	{
		$regex = '/^('.$pattern.')$/u';
		if ($this->value != '' && !preg_match($regex,$this->value)) {
				$this->errors[] = nl2br("El formato del campo $this->name no es valido \n "); 
		}
		return $this;
	}




	/**
	 *
	 * campos obligatorios
	 * @return $this
	 */
	
	public function required()
	{
		
		if ($this->value == '' || $this->value == null) {
			$this->errors[] = nl2br("El campo $this->name es requerido \n ");
		}
		return $this;
	}
	



	/**
	 *
	 * validar el minimo de un campo
	 * @param int $min
	 * @return $this
	 */
	public function min($length)
	{

		if (is_string($this->value)) {
			
			if (strlen($this->value) < $length) {
				$this->errors[] = nl2br("El campo $this->name es inferior al valor minimo permitido \n ");
		
			}
			
		}else{
			if ($this->value < $length) {
				$this->errors[] = nl2br("El campo $this->name es inferior al valor minimo permitido \n ");				
			}
		}
		return $this;
	}
	/**
	 *
	 * validar el maximo de un campo
	 * @param int $max
	 * @return $this
	 */
	public function max($length)
	{
		if (is_string($this->value)) {
			if (strlen($this->value) > $length) {
				$this->errors[] = nl2br("El campo $this->name es mayor al valor maximo permitido \n ");
		
			}
		}else{
			if ($this->value > $length) {
				$this->errors[] = nl2br("El campo $this->name es mayor al valor maximo permitido \n ");				
			}	
		}

		return $this;
	}





	/**
	 *
	 * validar si un campo es igual a otro
	 * @param mixed $value
	 * @return $this
	 */

	public function equal($value)
	{
		if ($this->value != $value) {
			$this->errors[] = nl2br("El valor del campo $this->name no coincide \n ");	
		}
		return $this;
	}
	




	/**
	 *
	 * verifica si un campo es entero
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_int($value)
	{
		if (filter_var($value,FILTER_VALIDATE_INT)) {
			return true;
		}
	}

	/**
	 *
	 * verifica si un valor es string del alfabetico
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_alpha($value)
	{
		if (filter_var($value, FILTER_VALIDATE_REGEXP,array('options' => array('regexp' => "/^[a-zA-Z]+$/"  )))) {
			return true;
		}
	}

	/**
	 *
	 * verifica si el valor es alfanumerico
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_alphanum($value)
	{
		if (filter_var($value, FILTER_VALIDATE_REGEXP,array('options'=> array('regexp' => "/^[a-zA-Z0-9]+$/")))) {
			return true;
		}
	}

	/**
	 *
	 * verifica si el valor es un correo electronico
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_email($value)
	{
		if (filter_var($value,FILTER_VALIDATE_EMAIL)) {
			return true;
		}
	}









	/*==========================================
	=            Mostranado errores o exitos            =
	==========================================*/
		
		/**
		 *
		 * validado
		 *@param boolean
		 *
		 */
		
		public function isSuccess()
		{
			if (empty($this->errors)) {
				return true;
			}
		}

		/**
		 *
		 * devolver los errores
		 *@return $this->errors
		 *
		 */
		public function getErrors()
		{
			if (!$this->isSuccess()) {
				return $this->errors;
			}
		}	


		/**
		 *
		 * visualizar los errores en html
		 *@return string $html
		 *
		 */
		public function displayErrors()
		{
			$html = '<ul>';
			foreach ($this->errors as $error) {
				$html += '<li>'.$error.'</li>';
			}
			$html += '</ul>';
			return $html;
		}
		/**
		 *
		 * devuelve los errores en string puro por echo
		 *@return boolean|string
		 *
		 */
		public function result()
		{
			if (!$this->isSuccess()) {
				foreach ($this->getErrors() as $error) {
					echo "$error\n";
				}
				exit;
			}else{
				return true;
			}
		}

	/*=====  End of Mostranado errores o exitos  ======*/
	




}