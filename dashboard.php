<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

$nome = Sessao::get('usuario_nome');
$email = Sessao::get('usuario_email');

if (!$nome || !$email) {
    header('Location: login.php');
    exit;
}

$emailCookie = $_COOKIE['lembrar_email'] ?? '';
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h2>
<?php if ($emailCookie): ?>
<p>Email lembrado: <?= htmlspecialchars($emailCookie) ?></p>
<?php endif; ?>
<a href="logout.php">Sair</a>
</body>
</html>
