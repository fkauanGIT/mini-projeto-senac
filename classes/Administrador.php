<?php
require_once 'Usuario.php';

class Administrador extends Usuario {
    public function exibirPerfil() {
        return "ADMINISTRADOR: {$this->getNome()}";
    }

    public function listarUsuarios() {
        return json_decode(file_get_contents(__DIR__ . '/../storage/usuarios.json'), true);
    }
}
?>
