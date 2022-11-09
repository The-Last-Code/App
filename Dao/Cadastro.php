<?php
//echo ("Cadastro");
require_once '../Conection/Conn.php';

    class Cadastro
    {
        
        public $msgErro = ""; 

        private $tableCientista;
        private $tableArea_atuacao_cientista;
        
        function __construct(){
             $this->tableCientista ='cientista';
             $this->tableArea_atuacao_cientista = 'area_atuacao_cientista';
        }
                                              
        function setCadastroBanco($nom_cientista, $cpf_cientista, $dtn_cientista, $email_cientista,
        $email_alternativo_cientista, $lattes_cientista, $snh_cientista)
        {
            $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);

            $sql = $pdo->prepare("SELECT *FROM $this->tableCientista
            WHERE cpf_cientista = :b");
            $sql->bindValue(":b", $cpf_cientista);
            $sql->execute();

            //veficar se já esta cadastrado, contando as linhas
            if($sql->rowCount() > 0)
            {
                echo "<SCRIPT> //not showing me this
                alert('CPF ja cadastrado')
                window.location.replace('../../app/View/LoginCadastro.php');
            </SCRIPT>";
            }
            else
            {
                //caso não, cadastrar   
                $sql = $pdo->prepare("INSERT INTO $this->tableCientista (nom_cientista, cpf_cientista, dtn_cientista, 
                email_cientista, email_alternativo_cientista, lattes_cientista, snh_cientista) 
                VALUES (:a, :b, :c, :d, :e, :f, :g)");

                $sql->bindValue(":a", $nom_cientista);
                $sql->bindValue(":b", $cpf_cientista);
                $sql->bindValue(":c", $dtn_cientista);
                $sql->bindValue(":d", $email_cientista);
                $sql->bindValue(":e", $email_alternativo_cientista);
                $sql->bindValue(":f", $lattes_cientista);
                $sql->bindValue(":g", $snh_cientista);
                $sql->execute();
                return true; 
                
            }
            return false;
            }

            public function CadastraCpf($cpf_cientista)
            {   
                $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);
                
                $sql_id = $pdo->prepare(("SELECT id_cientista FROM  $this->tableCientista WHERE cpf_cientista = :b"));
                $sql_id->bindValue(":b", $cpf_cientista);
                $sql_id->execute();

                $id = $sql_id->fetch(PDO::FETCH_ASSOC);
                    
                ksort($id);
                foreach ($id as $chave => $value)
                {
                    $id_cientista = $value;
                }
                
                session_start();
                $_SESSION['CadastroArea']=$value;
                
                $sql = $pdo->prepare("INSERT INTO area_atuacao_cientista (fk_id_cientista) VALUES (:a)");
                $sql->bindValue(":a", $value);
                $sql->execute();
                
            }
        }
?>