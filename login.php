<?php
require_once 'includes/functions.php';

if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    header("Location: index.php");
    exit();
}

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if($username === USER_NAME && password_verify($password, USER_PASS_HASH)){
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = 'Usuário ou senha inválidos.';
    }
}

<?php require_once 'includes/footer.php'; ?>
