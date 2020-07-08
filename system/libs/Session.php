<?php class Session
{
    public function add($name, $value)
    {
        if (session_status() == PHP_SESSION_NONE) {
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

    public function set($name,$value){
        if (empty($_SESSION[$name])) {
            $_SESSION[$name]=$value;
        }else{
            $_SESSION[$name]=$value;
        }
    }

    public function getAll()
    {
        session_start();
        return $_SESSION;
    }
    public function getStatus()
    {
        session_start();
        return session_status();
    }
    public function close()
    {
        session_start();
        session_destroy();
    }
}
