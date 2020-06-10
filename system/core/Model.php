<?php class Model
{
    protected $db;
    public function conectar()
    {
        /* $this->db = new PDO(SGBD, USER, PASS);
        return $this->db; */
    }
    public function query_execute(string $consulta)
    {
        /* $reply = self::conectar()->prepare($consulta);
        $reply->execute();
        return $reply; */
    }
    public function getNewConnection()
    {
        /* $this->db = null;
        try {
            $this->db = self::conectar();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $this->db; */
    }
}
