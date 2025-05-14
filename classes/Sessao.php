<?php
class Sessao {
    public function destruirSessao() {
        // Limpa as variáveis da sessão
        $_SESSION = [];

        // Destrói a sessão
        session_destroy();
    }
}
