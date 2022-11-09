<?php

require_once '../Conection/Conn.php';

    class CadastraPerfil extends Conn{

        private $tableArea_atuacao;
        private $tableFormacao;
        private $tablerede_Sociais;
        private $tableTelefone;
        private $tableTitulacao;
        private $tableArea_atuacao_cientista;

        function __construct()
        {
            parent::__construct();
            $this->tableArea_atuacao = 'area_atuacao';
            $this->tableFormacao = 'formacao';
            $this->tablerede_Sociais = 'rede_sociais';
            $this->tableTelefone = 'telefone';
            $this->tableTitulacao = 'titulacao';
            $this->tableArea_atuacao_cientista = 'area_atuacao_cientista';
        }

        public function setCadastroPerfil($nom_titulacao, $nom_area_atuacao, $end_rede_social, $dti_formacao,
        $dtt_formacao, $ddd_telefone, $num_telefone,$id)
        {

                $sql = $this->pdo->prepare("INSERT INTO $this->tableArea_atuacao (nom_area_atuacao) 
                VALUES (:a)");        

                $sql1 = $this->pdo->prepare("INSERT INTO  $this->tableFormacao (dti_formacao, dtt_formacao, fk_id_cientista) 
                VALUES (:b, :c, :z)");
    
                $sql2 = $this->pdo->prepare("INSERT INTO  $this->tablerede_Sociais (end_rede_social, fk_id_cientista) 
                VALUES (:d, :z)");
    
                $sql3 = $this->pdo->prepare("INSERT INTO $this->tableTelefone (ddd_telefone, num_telefone, fk_id_cientista) 
                VALUES (:e, :f, :z)");
    
                $sql4 = $this->pdo->prepare("INSERT INTO $this->tableTitulacao (nom_titulacao) 
                VALUES (:g)");

                $sql->bindValue(":a", $nom_area_atuacao);
                $sql->execute();
       
                $sql1->execute(array(
                    ':b' =>  $dti_formacao,
                    ':c' => $dtt_formacao,
                    ':z' => $id
                ));
                
    
                $sql2->execute(array(
                    ':d' =>  $end_rede_social,
                    ':z' => $id
                ));
    
                $sql3->execute(array(
                    ':e' =>  $ddd_telefone,
                    ':f' => $num_telefone,
                    ':z' => $id
                ));
    
                $sql4->bindValue(":g", $nom_titulacao);
                $sql4->execute();
                
                return true;
            }
            
            // public function CadastraIdAreaAtuacao()
            // {
            //     $_SESSION['idAreaAtuacao'];

            //     $sql = $this->pdo->prepare("INSERT INTO  $this->tableArea_atuacao_cientista (fk_id_area_atuacao_cientista) 
            //     VALUES (:a)");
            //     $sql->bindValue(":a", $_SESSION['idAreaAtuacao']);
            //     $sql->execute();                
            // }

    }

    
?>