<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../core/auth.php';
require_once __DIR__ . '/../../core/session.php';

redirectIfAuthenticated();

$errorMessage = $_SESSION['authError'] ?? null;
$successMessage = $_SESSION['authSuccess'] ?? null;
$oldEmail = $_SESSION['oldEmail'] ?? '';

unset($_SESSION['authError'], $_SESSION['authSuccess'], $_SESSION['oldEmail']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= APP_NAME; ?></title>
    <link rel="stylesheet" href="/EQF_ServiceHub/public/assets/css/global.css">
</head>
<body>
    <main class="auth-page">
        <section class="auth-shell">
            <div class="auth-brand-panel">
                <div class="auth-brand-content">
                    <div>
                        <span class="auth-brand-chip">EQF ServiceHub</span>
                        <h1 class="auth-brand-title">Centralized support and operational visibility.</h1>
                        <p class="auth-brand-text">
                            Access your workspace, submit IT requests, track progress, and review key operational indicators from a single platform.
                        </p>
                    </div>

                    <div class="auth-brand-features">
                        <div class="auth-brand-card">
                            <p class="auth-brand-card-title">Secure access</p>
                            <p class="auth-brand-card-text">
                                Role-based entry, session control, and protected modules.
                            </p>
                        </div>

                        <div class="auth-brand-card">
                            <p class="auth-brand-card-title">Responsive design</p>
                            <p class="auth-brand-card-text">
                                Optimized for desktop first, with support for phones and tablets.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auth-form-panel">
                <div class="auth-form-wrapper">
                    <div class="auth-header">
                        <div class="auth-logo">SH</div>
                        <h2 class="auth-title">BIENVENIDO</h2>
                        <p class="auth-subtitle">
                            Inicia Sesion para continuar en <?= APP_NAME; ?>.
                        </p>
                    </div>

                    <?php if ($errorMessage): ?>
                        <div class="alert alert-error">
                            <?= htmlspecialchars($errorMessage); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($successMessage): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($successMessage); ?>
                        </div>
                    <?php endif; ?>

                    <form action="processLogin.php" method="POST">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Corporativo</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="<?= htmlspecialchars($oldEmail); ?>"
                                placeholder="usuario@eqf.mx"
                                required
                                class="form-input"
                            >
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <label for="password" class="form-label" style="margin-bottom: 0;">Contraseña</label>
                                <a href="forgotPassword.php" class="link-primary">¿Olvidaste tu contraseña?</a>
                            </div>

                            <div class="password-field">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Ingresa tu contraseña"
                                    required
                                    class="form-input"
                                >
                                <button type="button" id="togglePassword" class="password-toggle">Ver</button>
                            </div>
                        </div>

                        <label class="form-check">
                            <input type="checkbox" name="rememberSession" value="1">
                            <span>Mantener sesion activa</span>
                        </label>

                        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                    </form>

                    <p class="auth-footer">
                        © <?= date('Y'); ?> <?= APP_NAME; ?>. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </section>
    </main>

   <script src="/EQF_ServiceHub/public/assets/js/auth.js"></script>
</body>
</html>