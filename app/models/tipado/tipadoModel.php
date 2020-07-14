<?php

class tipadoModel extends Model{
 

  //Muestra cualquier tabla 
  public function showTipadoSelect($table,$id,$compareTable){
    if($table == 'pais'){
      $query = "SELECT Id_".ucwords($table).",Descripcion FROM $table";
    }
    else{
      $query = "SELECT Id_".ucwords($table).",Descripcion FROM $table WHERE Id_".ucwords($compareTable)." = $id";
    }
    $res = Model::query_execute($query);
    return $res;
  }
}

?>