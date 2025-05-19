<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha, $idioma = "pt", $tema = "claro") {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function verificarSenha($senhaDigitada) {
        return password_verify($senhaDigitada, $this->senha);
    }

    public function exibirPerfil() {
        return "Usuário: {$this->nome}";
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function toArray() {
        return [
            "nome" => $this->nome,
            "email" => $this->email,
            "senha" => $this->senha,
        ];
    }
}
