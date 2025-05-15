<?php
class Sessao {
    public function iniciarSessao($usuario) {
        $_SESSION['usuario'] = serialize($usuario);
    }

    public function destruirSessao() {
        $_SESSION = [];
        session_destroy();
    }

    public function validarSessao() {
        return isset($_SESSION['usuario']);
    }

    public function getUsuario() {
        return unserialize($_SESSION['usuario']);
    }
}
?>
