<?php
$emailCookie = $_COOKIE['lembrar_email'] ?? '';
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<form method="POST" action="processa_login.php">
    E-mail: <input type="email" name="email" value="<?= htmlspecialchars($emailCookie) ?>" required><br>
    Senha: <input type="password" name="senha" required><br>
    <label><input type="checkbox" name="lembrar" value="1"> Lembrar e-mail</label><br>
    <button type="submit">Entrar</button>
</form>
<a href="cadastro.php">Não tem conta? Cadastre-se</a>
</body>
</html>
