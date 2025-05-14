<?php
class Sessao {
    public function destruirSessao() {
        session_start();
        session_destroy();
        header("Location: ./index.php");
        exit();
    }
}
?>
