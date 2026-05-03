<?php
session_start();

define('USER_NAME', 'admin');
define('USER_PASS_HASH', '$2y$10$3.1IgNmwltYaTFWCSzvAhumo9WhKb4ojkgPied8CIGiA.cPfDlwbm');

function check_auth(){
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
        header('Location: login.php');
        exit();
    }
}


function format_currency($value){
    return 'R$ ' . number_format($value, 2, ',', '.');
}


function get_transactions(){
    return isset($_SESSION['transactions']) ? $_SESSION['transactions'] : [];
}


function add_transaction($name, $value, $type){
    if (!isset($_SESSION['transactions'])){
        $_SESSION['transactions'] = [];
    }
    $_SESSION['transactions'][] = [
        'id' => uniqid(),
        'name' => $name,
        'value' => (float)$value,
        'type' => $type,
        'date' => date('Y-m-d H:i:s')
    ];
}


function calculate_balance(){
    $transactions = get_transactions();
    $balance = 0;
    foreach ($transactions as $t){
        if ($t['type'] === 'receita'){
            $balance += $t['value'];
        } else {
            $balance -= $t['value'];
        }
    }
    return $balance;
}


function calculate_total_expenses(){
    $transactions = get_transactions();
    $total = 0;
    foreach ($transactions as $t){
        if ($t['type'] === 'despesa'){
            $total += $t['value'];
        }
    }
    return $total;
}

?>