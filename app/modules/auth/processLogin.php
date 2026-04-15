<?php

require_once __DIR__ . '/../../core/session.php';
require_once __DIR__ . '/../../core/connectionDB.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$rememberSession = isset($_POST['rememberSession']);

$_SESSION['oldEmail'] = $email;

if ($email === '' || $password === '') {
    $_SESSION['authError'] = 'Please complete all required fields.';
    header('Location: ' . route('login'));
exit;
}

try {
    $query = $connection->prepare('SELECT id, full_name, email, password FROM users WHERE email = :email LIMIT 1');
    $query->execute(['email' => $email]);
    $user = $query->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['authError'] = 'Incorrect credentials. Please verify your information.';
        header('Location: ' . route('login'));
exit;
    }

    $_SESSION['userId'] = $user['id'];
    $_SESSION['userName'] = $user['full_name'];
    $_SESSION['userEmail'] = $user['email'];

    if ($rememberSession) {
        setcookie('rememberUser', $user['email'], time() + (86400 * 30), '/');
    } else {
        setcookie('rememberUser', '', time() - 3600, '/');
    }

    unset($_SESSION['oldEmail']);

    header('Location: ../../../dashboard.php');
    exit;
} catch (PDOException $exception) {
    $_SESSION['authError'] = 'An error occurred while processing the login.';
    header('Location: ' . route('login'));
exit;
}