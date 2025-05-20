<?php
session_start();
require_once "classes/Usuario.php";
require_once "classes/Administrador.php";
require_once "classes/Sessao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $usuarios = json_decode(file_get_contents("storage/usuarios.json"), true) ?? [];

        foreach ($usuarios as $u) {
            if ($u["email"] == $email) {
                $usuario = new Usuario(
                    $u["nome"],
                    $u["email"],
                    $u["senha"],
                );

                if (password_verify($senha, $u["senha"])) {
                    $sessao = new Sessao();
                    $sessao->iniciarSessao($usuario);

                    if (isset($_POST["lembrar"])) {
                        setcookie("email", $email, time() + 3600 * 24 * 30);
                    }

                    header("Location: dashboard.php");
                    exit;
                } else {
                    throw new Exception("Senha incorreta.");
                }
            }
        }
        throw new Exception("Usuário não encontrado.");
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}

$emailSalvo = $_COOKIE["email"] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/bonitamento.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="style">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
        <form method="POST">
            Email: <input placeholder="Digite seu E-mail" type="email" name="email" value="<?= $emailSalvo ?>" required><br>
            Senha: <input placeholder="Digite sua Senha" type="password" name="senha" required><br>
            <label><input id="check" type="checkbox" name="lembrar"> Lembrar-me</label><br>
            <button type="submit">Entrar</button>
        </form>
        <p><a href="cadastro.php">Não tem conta? Cadastre-se</a></p>
    </div>
</body>
</html>
