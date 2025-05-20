<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "classes/Usuario.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $usuarios = json_decode(file_get_contents("storage/usuarios.json"), true) ?? [];

        foreach ($usuarios as $u) {
            if ($u["email"] == $email) {
                throw new Exception("Usuário com este e-mail já existe.");
            }
        }

        $novo = new Usuario($nome, $email, $senha);
        $usuarios[] = $novo->toArray();
        file_put_contents("storage/usuarios.json", json_encode($usuarios, JSON_PRETTY_PRINT));

        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="assets/bonitamento.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="style"> 
        <h2>Cadastrar Novo Usuário</h2>
        <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
        <form method="POST">
            Nome Completo: <input placeholder="Digite seu Nome" type="text" name="nome" required><br>
            Email: <input placeholder="Digite seu Email" type="email" name="email" required><br>
            Senha: <input placeholder="Digite sua Senha" type="password" name="senha" required><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>