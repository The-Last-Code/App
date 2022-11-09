<?php
session_start();

if (empty($_SESSION["login"])) {
  header('location: LoginCadastro.php');
  session_destroy();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./style/styleEdit.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
</head>

<body>
  <div class="container">
    <div class="title">
      <h2 class="titulo">Cadastro</h2>
    </div>
    <div class="content">
      <form action="../Controllers/CadastroController.php" method="POST">
        <input type="hidden" name="acao" value="cadastraPerfil">
        <div class="user-details">

          <div class="input-box">
            <span class="details">Área de atuação</span>
            <input name="nom_titulacao" type="text" placeholder="Area de atuação" required>
          </div>

          <div class="input-box">
            <span class="details">Titulação</span>
            <input name="nom_area_atuacao" type="text" placeholder="Seu título" required>
          </div>

          <div class="input-box">
            <span class="details">Link do linkedin</span>
            <input name="end_rede_social" type="url" placeholder="Link do seu perfil">
          </div>

          <div class="input-box">
            <span class="details">Data início - Formação</span>
            <input name="dti_formacao" type="date">
          </div>

          <div class="input-box">
            <span class="details">Data término - Formação</span>
            <input name="dtt_formacao" type="date">
          </div>

          <div class="input-box">
            <span class="details" for="telefone">DDD</span>
            <input   type="number" min='0' max='9' name="ddd_telefone" placeholder="DDD">
          </div>

          <div class="input-box">
            <span class="details" for="telefone">Número de telefone</span>
            <input class="input-field" type="tel" name="num_telefone" placeholder="Digite um número de telefone" >
          </div>
        </div>
        <div class="button">
          <a href="./PaginaPerfil.php"><input type="submit" class="bt1" value="Cadastrar"></a>
          <a href="./PaginaPerfil.php"><input class="bt2" type="button" value="Voltar"></a>
        </div>
      </form>
    </div>
  </div>
  <script src="./script/app.js"></script>
</body>


</html>

<style>
 input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
