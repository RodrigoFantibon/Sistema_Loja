<?php
// include 'conexao.php';
require_once 'conexao.php';
require_once 'funcoes.php';
require_once '../phpmailer/includes/SMTP.php';
require_once '../phpmailer/includes/PHPMailer.php';
require_once '../phpmailer/includes/Exception.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class carrinho
{
    private $con;
    private $objFunc;
    private $id;

    public function __construct()
    {
        $this->con = new Conexao();
        $this->objFunc = new funcoes();
    }

    public function criarCarrinho()
    {
        $idUsuario = $_SESSION['usuario']['id'];
        $cst = $this->con->conectar()->prepare("SELECT * FROM carrinho WHERE cadastro_id = $idUsuario AND status = 0; ");
        $cst->execute();
        if ($cst->rowCount() > 0) {
            $cst = $cst->fetch();
            return $cst['id'];
        } else {
            $a = $this->con->conectar()->prepare("insert into carrinho (cadastro_id, status) value ($idUsuario, 0)");
            $a->execute();
            $cst = $this->con->conectar()->prepare("SELECT * FROM carrinho WHERE cadastro_id = $idUsuario AND status = 0; ");
            $cst = $cst->fetch();
            return $cst['id'];
        }
    }

    public function addCarrinho($idJogo = 0)
    {
        $idCarrinho = $this->criarCarrinho();
        $jogo = $this->con->conectar()->prepare("SELECT * FROM jogos WHERE id = $idJogo; ");
        $jogo->execute();
        $jogo = $jogo->fetch();
        $jogoCarrinho = $this->con->conectar()->prepare("SELECT * FROM carrinho_jogos WHERE jogo_id = $idJogo AND carrinho_id = $idCarrinho; ");
        $jogoCarrinho->execute();
        if ($jogoCarrinho->rowCount() > 0) {
            $jogoCarrinho = $jogoCarrinho->fetch();
            $a = $this->con->conectar()->prepare("UPDATE carrinho_jogos SET quantidade = quantidade + 1 WHERE id = {$jogoCarrinho['id']}");
            $a->execute();
            return $jogoCarrinho['id'];
        } else {
            $a = $this->con->conectar()->prepare("insert into carrinho_jogos (jogo_id, carrinho_id, quantidade) value ($idJogo, $idCarrinho, 1)");
            $a->execute();
            return true;
        }
    }

    public function buscaCarrinho()
    {
        session_start();
        $idUsuario = $_SESSION['usuario']['id'];
        $cst = $this->con->conectar()->prepare("SELECT * FROM loja.carrinho
        INNER JOIN carrinho_jogos ON carrinho_jogos.carrinho_id = carrinho.id
        INNER JOIN jogos ON jogos.id = carrinho_jogos.jogo_id
        WHERE cadastro_id = $idUsuario AND status = 0
        ;");
        $cst->execute();
        return $cst->fetchAll();
    }

    public function limparCarrinho()
    {
        $idCarrinho = $this->criarCarrinho();
        $jogoCarrinho = $this->con->conectar()->prepare("DELETE FROM carrinho_jogos WHERE carrinho_id = $idCarrinho; ");
        $jogoCarrinho->execute();
    }
    
}
