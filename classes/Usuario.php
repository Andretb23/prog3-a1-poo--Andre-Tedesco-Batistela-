<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha, $senha_ja_hash = false) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha_ja_hash ? $senha : password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function verificarSenha($senha) {
        return password_verify($senha, $this->senha);
    }
}
