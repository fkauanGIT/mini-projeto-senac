
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
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
<form method="POST">
    Email: <input type="email" name="email" value="<?= $emailSalvo ?>"><br>
    Senha: <input type="password" name="senha"><br>
    <label><input type="checkbox" name="lembrar"> Lembrar-me</label><br>
    <button type="submit">Entrar</button>
</form>
</body>
</html>