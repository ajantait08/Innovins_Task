<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['errors']['login'][] = 'You must be logged in to access this page.';
    header('Location: index.php');
    exit();
}
?>
