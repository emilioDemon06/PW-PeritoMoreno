<?php 

/**
 * 
 */
class Alertas
{
	
	private $valid_type = [];

	private $default = null;
	private $type = null;
	private $msg = null;


	function __construct()
	{
		$this->default = 'success';
		$this->valid_type = ['primary', 'secundary','success','danger','warning','info','light','dark'];
	}

	public static function newAlert($msg, $type = null)
	{
		$self = new self();
		if ($type == null) {
			$self->type = $self->default;
		}
		$self->type = in_array($type, $self->valid_type) ? $type : $self->default;

		if (is_array($msg)) {
			foreach ($msg as $m) {
				$_SESSION[$self->type][] = $m; 
			}
			return true;
		}
		$_SESSION[$self->type][] = $msg;
		return true;
	}

	static function danger($msg)
	{
		self::newAlert($msg,'danger');
		return true;
	}
	static function info($msg)
	{
		self::newAlert($msg,'info');
		return true;
	}
	static function success($msg)
	{
		self::newAlert($msg,'success');
		return true;
	}
	static function warning($msg)
	{
		self::newAlert($msg,'warning');
		return true;
	}
	
	public static function mostrarAlerta()
	{
		$self = new self();
		$placeholder = '';
		$output = '';

		foreach ($self->valid_type as $type) {
			if (isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
				foreach ($_SESSION[$type] as $m) {
					$placeholder = '<div class="alert alert-%s alert-dismissible fade show" role="alert">
  %s
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
					$output .= sprintf($placeholder,$type,$m);
				}
			unset($_SESSION[$type]);
			}
		}
		return $output;

	}

}