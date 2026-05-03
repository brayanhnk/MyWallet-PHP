<?php
require_once 'functions.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWallet - Gestão Financeira</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $current_page !== 'login.php'): ?>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <span class="logo-icon">💰</span> MyWallet
            </a>
            <div class="nav-links">
                <a href="index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">Dashboard</a>
                <a href="historico.php" class="<?= $current_page === 'historico.php' ? 'active' : '' ?>">Histórico</a>
                <a href="clean.php" class="btn-clear" onclick="return confirm('Tem certeza que deseja zerar o mês? Isso apagará todas as transações.');">Zerar Mês</a>
                <a href="logout.php" class="btn-logout">Sair</a>
            </div>
        </div>
    </nav>
    <div class="main-content">
    <?php else: ?>
    <div class="login-wrapper">
    <?php endif; ?>
