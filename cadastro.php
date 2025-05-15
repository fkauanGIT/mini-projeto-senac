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
<head><title>Cadastro</title></head>
<body>
    <h2>Cadastrar Novo Usuário</h2>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        Nome Completo: <input type="text" name="nome" required><br>
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>