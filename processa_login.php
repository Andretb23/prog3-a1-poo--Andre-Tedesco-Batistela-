<?php
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$lembrar = isset($_POST['lembrar']);

$usuario = Autenticador::logar($email, $senha);

if ($usuario) {
    // Armazenar só os dados, não o objeto inteiro
    Sessao::set('usuario_nome', $usuario->getNome());
    Sessao::set('usuario_email', $usuario->getEmail());

    if ($lembrar) {
        setcookie('lembrar_email', $usuario->getEmail(), time() + 3600 * 24 * 30);
    }

    header('Location: dashboard.php');
} else {
    echo "Login inválido. <a href='login.php'>Tente novamente</a>";
}
