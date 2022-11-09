<?php
include '../Models/User.php';
include '../Dao/Login.php';
include '../Models/Pub.php';
include '../Controllers/IClientsController.php';
include '../Models/UserPerfil.php';
require_once '../Conection/Conn.php';

class CadastroController{
  
  function Cadastro(){
    $nom_cientista =addslashes( $_POST["nom_cientista"]);
    $cpf_cientista =addslashes( $_POST["cpf_cientista"]);
    $dtn_cientista =addslashes( $_POST["dtn_cientista"]);
    $email_cientista =addslashes( $_POST["email_cientista"]);
    $email_alternativo_cientista =addslashes( $_POST["email_alternativo_cientista"]);
    $lattes_cientista =addslashes( $_POST["lattes_cientista"]);
    $snh_cientista = password_hash ($_POST['snh_cientista'],PASSWORD_DEFAULT);
    
    $user = new User($nom_cientista, $cpf_cientista, $dtn_cientista
    ,$email_cientista, $email_alternativo_cientista, $lattes_cientista, $snh_cientista  );

    if($user->CadastroBanco()==true)
    {
      $user->CadastraCpf($cpf_cientista);
      echo "<SCRIPT> //not showing me this
      alert('Cadastrado com sucesso')
      window.location.replace('../../app/View/LoginCadastro.php');
      </SCRIPT>";
    }
    else{
      echo "<SCRIPT> //not showing me this
      alert('Senha ou CPF incorreto')
      window.location.replace('../../app/View/LoginCadastro.php');
      </SCRIPT>";

    }
  
  }
  
  function Login()
  {
    if (isset($_POST['cpf_cientista'])){
      $nom_cientista = $_POST["cpf_cientista"];
      $snh_cientista = password_hash ($_POST['snh_cientista'],PASSWORD_DEFAULT);
    
      $log=new Login();
         if($log->Login($nom_cientista,$snh_cientista)==true)
         {
           header('Location: ../View/Home.php');
         }
         else{
           echo "<SCRIPT> //not showing me this alert('Senha ou CPF incorreto') window.location.replace('../../app/View/LoginCadastro.php'); </SCRIPT>";
         }
     }
  }

  function CadastroPub()
  {
      session_start();
      if (isset($_POST['tit_projeto'])){
      $tit_projeto = $_POST["tit_projeto"];
      $dti_projeto = $_POST["dti_projeto"];
      $dtt_projeto = $_POST["dtt_projeto"];
      $res_projeto = $_POST["res_projeto"];
      $pub_projeto = $_POST["pub_projeto"];
      
      $user = new Pub($tit_projeto, $dti_projeto, $dtt_projeto,$res_projeto,$pub_projeto);
      
      

      if($user->CadastroPub($_SESSION['login'])==true)
      {
        header('Location: ../View/Home.php');
      }
    }
  }


  function CadastroPerfil()
  {
      
      if (isset($_POST['nom_titulacao']))
      {
        session_start();
        $nom_titulacao = $_POST["nom_titulacao"];
        $nom_area_atuacao = $_POST["nom_area_atuacao"];
        $end_rede_social = $_POST["end_rede_social"];
        $dti_formacao = $_POST["dti_formacao"];
        $dtt_formacao = $_POST["dtt_formacao"];
        $ddd_telefone = $_POST["ddd_telefone"];
        $num_telefone = $_POST["num_telefone"];
    
      $user = new UserPerfil($nom_titulacao, $nom_area_atuacao, $end_rede_social, $dti_formacao,$ddd_telefone, $dtt_formacao, $num_telefone);
      
      $ob= new CadastraPerfil();
      $user->CadastraPerfil($_SESSION['login']);
      //$ob->CadastraIdAreaAtuacao();
      
      header('Location: ../View/PaginaPerfil.php');
    }
  }

}

  $acao = $_POST['acao'];

  if($acao=="cadastro")
  {
    $controle = new CadastroController();
    $controle->Cadastro();
  }
  else if($acao=="login")
  {
    $controle = new CadastroController();
    $controle->login();
  }
  else if($acao=="cadastroPub")
  {
    $controle = new CadastroController();
    $controle->CadastroPub();
  }
  else if($acao=="cadastraPerfil")
  {
    $controle = new CadastroController();
    $controle->CadastroPerfil();
  }

?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>