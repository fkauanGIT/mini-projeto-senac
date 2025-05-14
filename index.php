<?php
session_start();

$usuarioPadrao = [
    "email" => "teste@senac.com",
    "senha" => "1234"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if ($email == $usuarioPadrao["email"] && $senha == $usuarioPadrao["senha"]) {
        $_SESSION["usuario"] = $email;

        if (isset($_POST["lembrar"])) {
            setcookie("email", $email, time() + 3600 * 24 * 30);
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Email ou senha inválidos!";
    }
}

$emailSalvo = $_COOKIE["email"] ?? "";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/bonitamento.css">
    <title>Login</title></head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<body>
    <div class="style">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
        <form method="POST">
            Email: <input type="email" name="email" value="<?= $emailSalvo ?>"><br>
            Senha: <input type="password" name="senha"><br>
            <label><input type="checkbox" name="lembrar" id="check"> Lembrar-me</label><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
