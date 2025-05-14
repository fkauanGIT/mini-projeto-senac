<?php
require_once 'classes/Sessao.php';

// Nada de espaços ou HTML antes disso
session_start();

$sessao = new Sessao();
$sessao->destruirSessao();

// Redireciona para a página de login
header("Location: index.php");
exit;