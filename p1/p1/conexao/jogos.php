<?php
// include 'conexao.php';
require_once 'conexao.php';

class jogos
{

    private $con;


    public function __construct()
    {
        $this->con = new Conexao();
    }


    public function querySeleciona($q)
    {
        try {
            $cst = $this->con->conectar()->prepare("SELECT 'id', 'nome', 'sobrenome', 'email', 'senha', 'telefone', 'endereco' FROM 'cadastro' WHERE 'id' = :id; ");
            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $erro) {
            return 'erro ' . $erro->getMessage();
        }
    }


    public function querySelect()
    {
        try {
            $cst = $this->con->conectar()->prepare("SELECT * FROM jogos");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $erro) {
            return "erro" . $erro->getMessage();
        }
    }

    public function querySelectBusca($filtro)
    {
        try {
            $cst = $this->con->conectar()->prepare("SELECT * FROM `jogos` WHERE UPPER(name) like UPPER('%$filtro%')");
            // $cst->bindParam("?", "%$filtro%");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $erro) {
            return "erro" . $erro->getMessage();
        }
    }
}
