<?php
require_once 'includes/functions.php';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === USER_NAME && password_verify($password, USER_PASS_HASH)) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = 'Usuário ou senha inválidos.';
    }
}

require_once 'includes/header.php';
?>

<div class="login-card glass-panel">
    <div class="login-header">
        <div class="logo-large">💰</div>
        <h2>Bem-vindo ao MyWallet</h2>
        <p>Acesse sua conta para gerenciar finanças</p>
        <p class="text-muted" style="font-size: 0.8rem; margin-top: 10px;">Dica: Use <b>admin</b> / <b>admin123</b></p>
    </div>

    <?php if($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php" class="login-form">
        <div class="form-group">
            <label for="username">Usuário</label>
            <input type="text" id="username" name="username" required placeholder="Digite seu usuário">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required placeholder="Digite sua senha">
        </div>
        <button type="submit" class="btn-primary btn-block">Entrar</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
