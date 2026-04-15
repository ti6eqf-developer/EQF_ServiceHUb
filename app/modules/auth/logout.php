<?php

require_once __DIR__ . '/../../core/session.php';

session_unset();
session_destroy();

setcookie('rememberUser', '', time() - 3600, '/');

header('Location: login.php');
exit;