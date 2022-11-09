<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $tableProjeto;

        function __construct()
        {
            parent::__construct();
            $this->tableProjeto = 'projeto';
        }

        function getAll()
        {
            $sqlSelect = $this->pdo->query("SELECT * FROM $this->tableProjeto");
            $sqlSelect ->execute();
            return $sqlSelect;        
        }     
          
        function getUser($id)
        {
            $sql = "SELECT * FROM $this->tableProjeto WHERE fk_id_cientista = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            return $query;
        }
    }
    
?>