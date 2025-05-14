<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <script src="salvar-produto.js" defer></script>
    <link rel="stylesheet" href="toolbar.css">
    <script src="toolbar.js" defer></script>
</head>
<body>

<section class="toolbar">
  <div class="toolbar-logo">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
         class="bi bi-code-slash" viewBox="0 0 16 16">
      <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 
               3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0m6.292 0a.5.5 0 0 0 0 .708L14.293 
               8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0" />
    </svg>
    <h3>Protótipo</h3>
  </div>
  <div class="toolbar-links">
    <ul>
      <li>
        <button class="toolbar-link" type="button" id="btn-acessibilidade">Acessibilidade</button>
      </li>
      <li><a class="toolbar-link" href="#">Entrar</a></li>
    </ul>
  </div>
</section>

<section class="acessibility" id="painel-acessibilidade" style="display: none;">
  <div class="acessibility-page">
    <h3>Conteúdo</h3>
    <div class="acessibility-page-grid">
      <div class="acessibility-page-grid-content">
        <h3>Texto Maior</h3>
        <button type="button" id="btn-aumentar-texto">Aumentar Texto</button>
        <button type="button" id="btn-diminuir-texto">Diminuir Texto</button>
      </div>
    </div>

    <h3>Cor e Tela</h3>
    <div class="acessibility-page-grid">
      <div class="acessibility-page-grid-content">
        <h3>Modo Tela Escura</h3>
        <button type="button" id="btn-modo-escuro">Ativar Modo Escuro</button>
      </div>
    </div>
  </div>
</section>

<h2>Bem-vindo, <?= $_SESSION["usuario"] ?>!</h2>
<a href="logout.php">Sair</a>

<h3>Cadastrar Produto</h3>
<form id="form-produto">
    Nome: <input type="text" id="nome"><br>
    Preço: <input type="number" id="preco"><br>
    <button type="submit">Salvar</button>
</form>

<hr>
<a href="vitrine.html">Ver Vitrine</a>
</body>
</html>
