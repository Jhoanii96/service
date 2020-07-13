<?php

class tipadoModel extends Model{
 

  //Muestra cualquier tabla 
  public function showTipadoSelect($table){
    $query = "SELECT Descripcion FROM $table";
    $res = Model::query_execute($query);
    return $res;
  }
}

?>