<?php
session_start();

$usuarioAdmin = [
    "nome" => "admin",
    "email" => "admin@senac.com",
    "senha" => "1234"
];

$usuarioPadrao = [
    "nome" => "teste",
    "email" => "teste@senac.com",
    "senha" => "1234"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if ($nome == $usuarioPadrao["nome"] && $email == $usuarioPadrao["email"] && $senha == $usuarioPadrao["senha"]) {
        $_SESSION["usuario"] = $nome;

        if (isset($_POST["lembrar"])) {
            setcookie("email", $email, time() + 3600 * 24 * 30);
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Informações inválidas!";
    }
}

$emailSalvo = $_COOKIE["email"] ?? "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        Nome: <input type="nome" name="nome"><br>
        Email: <input type="email" name="email" value="<?= $emailSalvo ?>"><br>
        Senha: <input type="password" name="senha"><br>
        <label><input type="checkbox" name="lembrar"> Lembrar-me</label><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
