<?php

require_once __DIR__ . '/../app/config/app.php';
require_once __DIR__ . '/../app/helpers/url.php';
require_once __DIR__ . '/../app/core/session.php';

$route = $_GET['url'] ?? 'login';

switch ($route) {
    case '':
    case 'login':
        require_once __DIR__ . '/../app/modules/auth/login.php';
        break;

    case 'forgot-password':
        require_once __DIR__ . '/../app/modules/auth/forgotPassword.php';
        break;

    case 'process-login':
        require_once __DIR__ . '/../app/modules/auth/processLogin.php';
        break;

    case 'process-forgot-password':
        require_once __DIR__ . '/../app/modules/auth/processForgotPassword.php';
        break;

    case 'logout':
        require_once __DIR__ . '/../app/modules/auth/logout.php';
        break;

    default:
        http_response_code(404);
        echo '404 - Page not found';
        break;
}