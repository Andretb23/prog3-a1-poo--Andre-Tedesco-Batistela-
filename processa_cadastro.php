<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

$usuario = new Usuario($nome, $email, $senha);
Autenticador::registrar($usuario);

header('Location: login.php');
exit;
