<?php
session_start();

if (empty($_SESSION["login"])) {
  header('location: LoginCadastro.php');
  session_destroy();
}

require_once('../Controllers/PerfilController.php');

$controller = new clientsController();

$action = !empty($_GET['a']) ? $_GET['a'] : 'getAllPerfil';

$controller->{$action}();

$resultData = $_SESSION['perfil'];
$resultData2 = $_SESSION['perfil2'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" href="./style/styleEdit.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
</head>

<body>

  <div class="wrapper">
    <div class="left">
      <img src="./img/user2-160x160.png" alt="user" width="150">

      <?php foreach ($resultData as $data) : ?>
        <h2><?= $data['nom_cientista'] ?></h2>
      <?php endforeach; ?>

      <i>
        <h4>Biólogo</h4>
      </i>
      <br>
    </div>
    <div class="right">

      <div class="info">
        <h2 class="titulo">Meu Perfil</h2><br>
        <h3>Informações Pessoais</h3>

        <div class="info_data">

          <div class="data">
            <h4>Nome</h4>
            <?php foreach ($resultData as $data) : ?>
              <p><?= $data['nom_cientista'] ?></p>
            <?php endforeach; ?>
          </div>

          <div class="data">
            <h4>Email</h4>
            <?php foreach ($resultData as $data) : ?>
              <p><?= $data['email_cientista'] ?></p>
            <?php endforeach; ?>
          </div>

          <div class="data">
            <h4>Telefone</h4>
            <?php foreach ($resultData2 as $data) : ?>
              <p><?= $data['ddd_telefone'] . $data['num_telefone'] ?></p>
            <?php endforeach; ?>
          </div>

        </div>

      </div>

      <div class="projects">
        <h3>Formação</h3>
        <div class="projects_data">
          <div class="data">
            <h4>Área de Atuação</h4>
            <b>
              <p>Biólogo Marinho</p>
            </b>
          </div>
          <div class="data">
            <h4>Formação</h4>
            <p>Início - 99/99/9999 / Fim - 99/99/9999</p>
          </div>
        </div>
      </div>

      <div class="social_media">
        <ul>
          <div class="social_media2">
            <li><a class="linkedin" href="" target="_blank"><i class="fab fa-linkedin"></i></a></li>
          </div>
          <div>


            <a href="./Home.php"><button>Voltar</button></a>
            <a href="./CadastroPerfil.php"><button>Editar</button></a>
          </div>
        </ul>
      </div>
    </div>
  </div>

</body>

</html>