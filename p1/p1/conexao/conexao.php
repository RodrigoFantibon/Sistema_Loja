<?php
class Conexao
{
  private $usuario;
  private $senha;
  private $banco;
  private $servidor;
  private static $pdo;
  private $handleDB;

  public function __construct()
  {
    $this->servidor = "localhost";
    $this->banco = "loja";
    $this->usuario = "root";
    $this->senha = "";
    try {
      $this->handleDB = new PDO('mysql:host=' . $this->servidor . ';dbname=' . $this->banco, $this->usuario, $this->senha);
    } catch (PDOException $e) {
      print_r($e);
    }

    $this->handleDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  public function lastInsertId()
  {
    return $this->handleDB->lastInsertId();
  }

  public function conectar()
  {

    try {
      if (is_null(self::$pdo)) {
        self::$pdo = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->banco, $this->usuario, $this->senha);
      }
      return self::$pdo;
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }
}
