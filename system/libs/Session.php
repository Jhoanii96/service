<?php

class Session
{
	public function add($name, $value)
	{

		if (session_status() == PHP_SESSION_NONE) {
			ini_set('session.cookie_lifetime', 60 * 60 * 24 * 30);
			ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 30);
			session_start();
		}

		$_SESSION[$name] = $value;
	}

	public function get($name)
	{
		if (empty($_SESSION[$name])) {
			return null;
		} else {
			return $_SESSION[$name];
		}
	}

	public function getAll()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		return $_SESSION;
	}

	public function getStatus()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		return session_status();
	}

	public function close()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		session_destroy();
	}
}

?>