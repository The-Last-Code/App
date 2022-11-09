<?php
   
    require_once "../Dao/Perfil.php";
    include '../Controllers/IClientsController.php';

    class ClientsController 
    {
        private $model;

        function __construct()
        {
            $this->model = new ClientModel();
        }

    function getAllPerfil()
    {
        $resultData = $this->model->getAllCientista($_SESSION['login']);
        $_SESSION['perfil'] = $resultData;
        $resultData2 = $this->model->getAllTelefone($_SESSION['login']);
        $_SESSION['perfil2'] = $resultData2;
        $resultData3 = $this->model->getAllArea($_SESSION['login']);
        $_SESSION['perfil3'] = $resultData2;
    }
}
?>