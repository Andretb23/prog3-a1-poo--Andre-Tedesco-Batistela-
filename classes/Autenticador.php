<?php
require_once 'Usuario.php';

class Autenticador {
    private static $arquivo = 'usuarios.json';

    public static function registrar(Usuario $usuario) {
        $usuarios = self::getUsuarios();
        $usuarios[] = [
            'nome' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
        ];
        file_put_contents(self::$arquivo, json_encode($usuarios));
    }

    public static function logar($email, $senha) {
        $usuarios = self::getUsuarios();

        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $email && password_verify($senha, $usuario['senha'])) {
                return new Usuario($usuario['nome'], $usuario['email'], $usuario['senha']);
            }
        }

        return null;
    }

    public static function getUsuarios() {
        if (!file_exists(self::$arquivo)) {
            return [];
        }

        $conteudo = file_get_contents(self::$arquivo);
        return json_decode($conteudo, true) ?? [];
    }
}
