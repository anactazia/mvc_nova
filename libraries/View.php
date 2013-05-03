<?php
/**
* Class for View
*
* @package Nova
*/
class View {

/**
* Constructor
*/	
	function __construct() {
	}

/**
* Render View
*/
	public function render($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/' . $name . '.php';	
		}
		else {

			require 'views/' . $name . '.php';
			require 'views/footer.php';	
		}
	}
	
	/**
* show View
*/
	public function clean($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/' . $name . '.php';	
		}
		else {

			require 'views/' . $name . '.php';
		}
	}

}
