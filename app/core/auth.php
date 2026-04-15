<?php

require_once __DIR__ . '/session.php';

function isUserLoggedIn(): bool
{
    return isset($_SESSION['userId']);
}

function redirectIfAuthenticated(): void
{
    if (isUserLoggedIn()) {
        header('Location: ../../../dashboard.php');
        exit;
    }
}