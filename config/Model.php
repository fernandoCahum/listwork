<?php

require_once './env.php';

abstract class Conexion 
{
  protected $conn;
  protected $query;
  protected $rows = [];

  abstract protected function set();
  abstract protected function get();
  abstract protected function del();


  private function db_open()
  {
    try{
      $this->conn = new PDO(
                          'mysql:host=' . DATA['HOST'] .';
                          dbname=' . DATA['DB'],
                          DATA['USER'],
                          DATA['PASSWORD']
                          );
    
    }catch(PDOException $e){
      echo 'Error!' . $e->getMessage() . ' en la línea: ' . $e->getLine() . PHP_EOL;
    }

  }

  private function db_close()
  {
      $this->conn = null;
  }

  protected function set_query()
  {
    $this->db_open();
    $this->conn->query($this->query);
    $this->db_close;
  }
  
  protected function get_query(){
    $this->db_open();
    $resultado = $this->conn->query($this->query);
    while ( $this->rows[] = $resultado->fetch_assoc() );
    $resultado->close();
    $this->db_close();
    return array_pop( $this->rows );
  }

  
}





