<?php class Model
{
    protected $db;
    static public function conectar()
    {
        $db = new PDO(SGBD, USER, PASS);
        return $db;
    }
    static public function query_execute(string $consulta)
    {
        $reply = self::conectar()->prepare($consulta);
        $reply->execute();
        return $reply;
    }
    static public function getNewConnection()
    {
        $db = null;
        try {
            $db = self::conectar();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $db;
    }
}
