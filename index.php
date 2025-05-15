<?php
session_start(); // Inicia a sessão

<<<<<<< HEAD
// Usuário e senha padrão para comparação
$usuarioPadrao = [
    "email" => "teste@senac.com",
    "senha" => "1234"
];
=======
$usuariosJson = file_get_contents("storage/usuarios.json");
$usuarios = json_decode($usuariosJson, true);
>>>>>>> afbf7c6099b23184f715263e42f7056adbde5b2b

// Verificação do envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
    $email = htmlspecialchars($_POST["email"]);  // Sanitiza a entrada para evitar XSS
    $senha = $_POST["senha"];  // Senha fornecida pelo usuário

    // Verifica se o email e a senha correspondem aos padrões
    if ($email == $usuarioPadrao["email"] && $senha == $usuarioPadrao["senha"]) {
        $_SESSION["usuario"] = $email;  // Cria a sessão para o usuário

        // Se a opção "lembrar" estiver marcada, armazena o email em um cookie
        if (isset($_POST["lembrar"])) {
            setcookie("email", $email, time() + 3600 * 24 * 30);  // Cookie por 30 dias
        }

        // Redireciona para o dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Email ou senha inválidos!";  // Mensagem de erro
=======
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    foreach ($usuarios as $usuario) {
        if ($nome == $usuario["nome"] && $email == $usuario["email"] && $senha == $usuario["senha"]) {
            $_SESSION["usuario"] = $nome;

            if (isset($_POST["lembrar"])) {
                setcookie("email", $email, time() + 3600 * 24 * 30);
            }

            header("Location: dashboard.php");
            exit;
        }
>>>>>>> afbf7c6099b23184f715263e42f7056adbde5b2b
    }
    
    $erro = "Informações inválidas!";
}

// Se o cookie "email" estiver configurado, exibe no campo de email
$emailSalvo = $_COOKIE["email"] ?? ""; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<<<<<<< HEAD
<h2>Login</h2>

<!-- Exibe a mensagem de erro se as credenciais forem inválidas -->
<?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

<form method="POST">
    Email: <input type="email" name="email" value="<?= htmlspecialchars($emailSalvo) ?>"><br>
    Senha: <input type="password" name="senha"><br>
    <label><input type="checkbox" name="lembrar"> Lembrar-me</label><br>
    <button type="submit">Entrar</button>
</form>
=======
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        Nome: <input type="nome" name="nome"><br>
        Email: <input type="email" name="email" value="<?= $emailSalvo ?>"><br>
        Senha: <input type="password" name="senha"><br>
        <label><input type="checkbox" name="lembrar"> Lembrar-me</label><br>
        <button type="submit">Entrar</button>
    </form>
>>>>>>> afbf7c6099b23184f715263e42f7056adbde5b2b
</body>
</html>
