<?php
session_start();
if (isset($_SESSION['transactions'])) {
    unset($_SESSION['transactions']);
}
header("Location: index.php");
exit;
?>
