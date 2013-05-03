<?php
/**
* Class for Session
*
* @package Nova
*/
class Session {

/**
* Init a new session
*/	
	public static function init()
	{
		@session_start();
	}

/**
* Set session values
*/	
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

/**
* Get session values
*/		
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}

/**
* Destroy session
*/		
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}
	
}
