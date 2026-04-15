<?php

require_once __DIR__ . '/../../core/session.php';
require_once __DIR__ . '/../../core/connectionDB.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: forgotPassword.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$_SESSION['oldEmail'] = $email;

if ($email === '') {
    $_SESSION['authError'] = 'Please enter your corporate email.';
    header('Location: forgotPassword.php');
    exit;
}

try {
    $query = $connection->prepare('SELECT id, email FROM users WHERE email = :email LIMIT 1');
    $query->execute(['email' => $email]);
    $user = $query->fetch();

    if (!$user) {
        $_SESSION['authError'] = 'No account was found with that email.';
        header('Location: forgotPassword.php');
        exit;
    }

    $_SESSION['authSuccess'] = 'Recovery request generated successfully. The automatic flow will be connected next.';
    unset($_SESSION['oldEmail']);

    header('Location: forgotPassword.php');
    exit;
} catch (PDOException $exception) {
    $_SESSION['authError'] = 'An error occurred while processing the request.';
    header('Location: forgotPassword.php');
    exit;
}