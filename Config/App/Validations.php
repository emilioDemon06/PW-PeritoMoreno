<?php

class Validations
{

	private $name;
	private $value;
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
		'email-RFC' => "[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$",
		'text'	=> '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
		'tel'	=>	'[0-9+\s()-]+',
		'int'	=>	'[0-9]+',
		'word'	=>	'[\p{L}\s]+',
		'alphanum'	=>	'[\p{L}0-9]+',
		'alpha'	=>	'[\p{L}]+',
		'dir' => "[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)* (((#|[nN][oO]\.?) ?)?\d{1,4}(( ?[a-zA-Z0-9\-]+)+)?)",
		'dir2' => "[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*",
		'telefono' => "0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?",
		'url' => "https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$",
		'password' => '(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$', //La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
		'fecha-dd-mm-aaaa' => '(?:3[01]|[12][0-9]|0?[1-9])([\-/.])(0?[1-9]|1[1-2])\1\d{4}$', //31.12.3013 01/01/2013 5-3-2013 15.03.2013
		'fecha-aaaa-mm-dd' => '\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$', //2013-12-14 2013-07-08 2013-7-14 2013/11/8 2013.11.8
		'visa' => "3[47][0-9]{13}$",
		'mastercard' => "5[1-5][0-9]{14}$",
		'americanexpress' => "3[47][0-9]{13}$",
		'discover' => "6(?:011|5[0-9]{2})[0-9]{12}$",
		'visa-Mastercard-discover' => "(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011)([\- ])?\d{4}\2\d{4}\2\d{4})$"	
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
			if (is_array($this->value) == FALSE) {
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
	 * si existe un fichero
	 * @return $this
	 */
	
	 public function exist_file()
	 {
		 
		 if (file_exists($this->value)) {
			 $this->errors[] = nl2br("El campo $this->name no existe \n ");
		 }
		 return $this;
	 }

	/**
	 *
	 * si es un email con filter_var
	 * @return $this
	 */
	
	 public function email()
	 {
		 
		 if (filter_var($this->value, FILTER_VALIDATE_EMAIL) == false) {
			$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n ");
		 }
		 return $this;
	 }
	
	/**
	 *
	 * si es una url con filter_var
	 * @return $this
	 */
	
	 public function url()
	 {
		 
		 if (filter_var($this->value, FILTER_VALIDATE_URL) == false) {
			$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n ");
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
	public function is_int()
	{
		if (filter_var($this->value,FILTER_VALIDATE_INT)) {
			$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n ");
		}
		return $this;
	}

	/**
	 *
	 * verifica si un valor es string del alfabetico
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_alpha()
	{
		if (filter_var($this->value, FILTER_VALIDATE_REGEXP,array('options' => array('regexp' => "/^[a-zA-Z]+$/"  )))) {
			$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n ");
		}
		return $this;
	}

	/**
	 *
	 * verifica si el valor es alfanumerico
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_alphanum()
	{
		if (filter_var($this->value, FILTER_VALIDATE_REGEXP,array('options'=> array('regexp' => "/^[a-zA-Z0-9]+$/")))) {
			$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n ");
		}
		return $this;
	}

	/**
	 *
	 * verifica si el valor es un correo electronico
	 * @param mixed $value
	 * @return boolean
	 */
	public function is_email()
	{
		if (filter_var($this->value,FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = nl2br("El formato del campo  $this->name no es valido \n ");
		}
		return $this;
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