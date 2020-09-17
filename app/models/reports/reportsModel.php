<?php

class reportsModel extends Model{


  public function getReportMonto($desde,$hasta){
    // SELECT DISTINCT DATE_FORMAT(Fecha,'%y-%m-%d') FROM historia_clinica WHERE Fecha BETWEEN '2020-09-01' AND '2020-09-13'
    // SELECT DATE_FORMAT(Fecha,'%y-%m-%d') AS fecha, SUM(Monto) as Monto FROM historia_clinica GROUP BY Fecha HAVING fecha BETWEEN '2020-09-01' AND '2020-09-13'
    $query = "SELECT Fecha, SUM(Monto) as Monto,COUNT(Monto) as Cantidad FROM historia_clinica GROUP BY DATE_FORMAT(Fecha,'%y-%m-%d') HAVING Fecha BETWEEN '$desde' AND '$hasta'";
    return Model::query_execute($query);
  }
}