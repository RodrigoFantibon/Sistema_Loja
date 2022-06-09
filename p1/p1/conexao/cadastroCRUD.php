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

// $conexao = new conexaoBD();

  //acessando o objeto Dados
    class cliente{
    // private $id, $nome, $sobrenome, $email, $senha, $confirmSenha, $telefone, $endereco;
            private $con;
            private $objFunc;
            private $id;
            private $nome;
            private $sobrenome;
            private $email ;
            private $senha;
            private $confirmSenha;
            private $telefone ;
            private $endereco;

        public function __construct(){
            $this->con = new Conexao();
            $this->objFunc = new funcoes();
        }

        public function __set($atributo, $valor){
            $this->atributo = $valor;
        }

        public function __get ($atributo ){
            return $this->$atributo;
        }
 
        public function querySeleciona($dado){
            try{
                $this->id = $this->objFunc->base64($dado, 2);
                $cst = $this->con->conectar()->prepare("SELECT 'id', 'nome', 'sobrenome', 'email', 'senha', 'telefone', 'endereco' FROM 'cadastro' WHERE 'id' = :id; ");
                $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
                $cst->execute();
                return $cst->fetch();
            }catch(PDOException $erro){
                return 'erro '.$erro->getMessage();
            }
        }


        public function querySelect(){
            try{
                $cst = $this->con->conectar()->prepare("SELECT 'id', 'nome', 'sobrenome', 'email', 'senha', 'telefone', 'endereco' FROM 'cadastro' ");
                $cst->execute();
                return $cst->fetchAll();
            }catch(PDOException $erro){
                    return "erro".$erro->getMessage();
            }
        }

        public function queryInsert($dados){
            try{
                $this->nome = $this->objFunc->tratarCaracter($dados['nome'], 1);
                $this->sobrenome = $dados['sobrenome'];
                $this->email = $dados['email'];
                $this->senha = sha1($dados['senha']);
                $this->telefone = $dados['telefone'];
                $this->endereco = $dados['endereco'];
                $cst = $this->con->conectar()->prepare("INSERT INTO cadastro (nome , sobrenome, email, senha, telefone, endereco) VALUES (:nome, :sobrenome, :email, :senha, :telefone, :endereco);");
                $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $cst->bindParam(":sobrenome", $this->sobrenome, PDO::PARAM_STR);
                $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                $cst->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                $cst->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                if($cst->execute()){
                    return "ok";
                }
                else{
                    return "erro";
                }
            }catch(PDOException $erro){
                return "erro".$erro->getMessage();
            }
        }
        public function queryUpdate($dados){
            try{
                    $this->id= $this->objFunc->base64($dados['id'],2);
                    $this->nome= $this->objFunc->base64($dados['nome'],1);
                    $this->sobrenome = $dados['sobrenome'];
                    $this->email = $dados['email'];
                    $this->senha = $dados['senha'];
                    $this->telefone = $dados['telefone'];
                    $this->endereco = $dados['endereco'];
                    $cst = $this->con->conectar()->prepare("UPDATE 'cadastro' SET 'nome' = :nome, 'sobrenome' = :sobrenome, 'email' = :email, 'senha' = :senha, 'telefone' = :telefone, 'endereco' = :endereco WHERE 'id' = :id;");
                    $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $cst->bindParam(":sobrenome", $this->sobrenome, PDO::PARAM_STR);
                    $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                    $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    if($cst->execute()){
                        return "ok";
                    }
                    else{
                        return "erro";
                    }
            }catch(PDOException $erro){
                return "erro".$erro->getMessage();
            }
        }

            public function queryDelete($dado){
                try{
                    $this->id = $this->objFunc->base64($dado,2);
                    $cst = $this->con->conectar()->prepare("DELETE FROM 'cadastro' WHERE 'id' = :id;");
                    $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
                    if($cst->execute()){
                        return "ok";
                    }
                    else{
                        return "erro";
                    }
                }catch(PDOException $erro){
                    return "erro".$erro->getMessage();
                }
            }

            public function queryVerificaEmail($dado){
                try{
                    
                    $this->email = $dado['email'];
                    $cst = $this->con->conectar()->prepare("SELECT email FROM cadastro WHERE email = (:email);");
                    $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                    if($cst->execute()){
                        return "ok";
                    }
                    else{
                        return "erro";
                    }
                }catch(PDOException $erro){
                    return "erro".$erro->getMessage();
                }
            }

          function RedefinirSenha($dados){
            try{
                $this->senha = $dados['senha'];
                $cst = $this->con->conectar()->prepare("UPDATE cadastro SET senha = :senha; WHERE email = :email;");
                $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
           
                if($cst->execute()){
                    return "ok";
                }
                else{
                    return "erro";
                }
            }catch(PDOException $erro){
                return "erro".$erro->getMessage();
            }
            }

            function login($dados){

                try{
                    $this->email = $dados['email'];
                    $this->senha = $dados['senha'];
                    $cst = $this->con->conectar()->prepare("SELECT email, senha FROM cadastro WHERE email = (:email) AND senha = (:senha);");
                    $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
               
                    if($cst->execute()) {
                        if($cst->rowCount() > 0)
                            return $cst->fetch(PDO::FETCH_ASSOC);
                        else
                            return false;
                    }
                   
                }catch(PDOException $erro){
                    return "erro".$erro->getMessage();
                }
                
            }

            // function enviarEmail($dado){
            //    $envEmail = $this->email = $dado['email'];
            //     $subject = 'test de envio';
            //     $message = 'olá, apenas um teste';
            //     $headers = 'From: rs644521@gmail.com' . "\r\n" . 'Reply-To: rodrigo.fantibon@hotmail.com';

            //     mail($envEmail, $subject, $message, $headers);

            //     print "enviado";
            
            // }

            //  function enviarEmail($dado){
            //    $emailRec = $this->email = $dado['email'];
            //     $mail = new PHPMailer();
            //     $mail->isSMTP();
            //     $mail->Host="smtp.gmail.com";
            //     $mail->SMTPAuth="true";
            //     $mail->SMTPSecure="tls";
            //     $mail->Port="578";
            //     $mail->username=$emailRec;
            //     $mail->Password="SenhaServidorLocal";
            //     $mail->Subject = "Test Email Using PHPMAILER";
            //     $mail->setFrom($emailRec);
            //     $mail->Body="This is a test";
            //     $mail->addAddress($emailRec);
               
            //     if($mail->Send()){
            //         echo "Email Enviado";
            //     }
            //     else{
            //         echo "erro";
            //     }
            //     $mail->smtpClose();
            
            // }

            
            //  function enviarEmail($dado){
            //    $emailRec = $this->email = $dado['email'];
            //     $mail = new PHPMailer();
            //     try{
            //          //SMTP Serve Configuration
            //    $mail->SMTPDebug= 2;
            //     $mail->isSMTP();
            //     $mail->Host="smtp.gmail.com";
            //     $mail->SMTPAuth="true";
            //     $mail->username="LojadeGamesP2@gmail.com";
            //     $mail->Password="senhaServidorLocal";
            //     $mail->SMTPSecure="tls";
            //     $mail->Port="578";
               

            //     $mail->setFrom('LojadeGamesP2@gmail.com', 'Rodrigo Santana');
            //     $mail->addAddress('rs644521@gmail.com');
            //     $mail->addReplyTo('rs644521@gmail.com');

            //     $mail->isHTML(true);
            //     $mail->Subject="MY test the sent email..";
            //     $mail->Body="test email";

            
            //     echo "Message has ben sent";
                    
            //     if($mail->Send()){
            //         echo "Email Enviado";
            //     }
            //     else{
            //         echo "erro";
            //     }
                    
            //     }
            //     catch(Exception $erro){
            //         return "erro: ".$mail->ErrorInfo;
            //     } 
              
               
            
            // }


        }
    



            
        

       



        

?>