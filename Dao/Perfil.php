<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $tableCientista;
        private $tableTelefone;
        private $tableArea_atuacao_cientista;

        function __construct()
        {
            parent::__construct();
            $this->tableCientista = 'cientista';
            $this->tableTelefone = 'telefone';
            $this->tableArea_atuacao_cientista = 'area_atuacao_cientista';
            
        }
        
        function getAllCientista($id)
        {
            $sqlSelect = $this->pdo->query("SELECT nom_cientista, email_cientista FROM $this->tableCientista WHERE id_cientista = $id");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        function getAllTelefone($id)
        {
            $sqlSelect2 = $this->pdo->query("SELECT ddd_telefone, num_telefone
            FROM $this->tableTelefone WHERE fk_id_cientista = $id");
            $resultQuery2 = $sqlSelect2->fetchAll();
            return $resultQuery2;
        }

        function getAllArea($id)
        {
            $sqlSelect2 = $this->pdo->query("SELECT * FROM $this->tableArea_atuacao_cientista
            WHERE fk_id_cientista = $id");
            $resultQuery2 = $sqlSelect2->fetchAll();
            return $resultQuery2;
        }
    }
?>