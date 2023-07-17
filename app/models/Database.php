<?php 

class Database 
{
  private $db_host = DB_HOST;
  private $db_user = DB_USER;
  private $db_pass = DB_PASS;
  private $db_name = DB_NAME;

  public function getConnection()
  {
    try {
      $pdo = new PDO(
        "mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_pass
      );
      return $pdo;
    } catch(PDOException $e) {
      echo "Desculpa, erro interno, verifique o banco de dados!<br>";
      exit();
    }
  }
}