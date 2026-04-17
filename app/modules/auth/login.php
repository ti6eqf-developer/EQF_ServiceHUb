<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../core/auth.php';
require_once __DIR__ . '/../../core/session.php';
require_once __DIR__ . '/../../helpers/url.php';

redirectIfAuthenticated();

$errorMessage = $_SESSION['authError'] ?? null;
$successMessage = $_SESSION['authSuccess'] ?? null;
$oldEmail = $_SESSION['oldEmail'] ?? '';

unset($_SESSION['authError'], $_SESSION['authSuccess'], $_SESSION['oldEmail']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= APP_NAME; ?></title>
    <link rel="stylesheet" href="<?= asset('css/global.css'); ?>">
</head>
<body>
    <main class="auth-page">
        <section class="auth-shell">
            <div class="auth-brand-panel">
                <div class="auth-brand-content">
                    <div>
                        <span class="auth-brand-chip">EQF ServiceHub</span>
                        <h1 class="auth-brand-title">Soporte centralizado y visibilidad operativa.</h1>
                        <p class="auth-brand-text">
                            Acceda a su espacio de trabajo, envíe solicitudes de TI, realice un seguimiento del progreso y revise indicadores operativos clave desde una única plataforma.
                        </p>
                    </div>

                    <div class="auth-brand-features">
                        <a href="https://portal-interno-eqf.com/moodle/login/index.php" target="_blank">
                        <div class="auth-brand-card">
                            <p class="auth-brand-card-title">Portal Interno</p>
                            <p class="auth-brand-card-text">
                                
                                    Accede a tu plan de capacitación y desarrollo interno.
                            </p>
                            </a>
                        </div>

                        <div class="auth-brand-card">
                            <a href="https://eqf.com.mx/quienes-somos/" target="_blank">
                            <p class="auth-brand-card-title">Conoce EQF</p>
                            <p class="auth-brand-card-text">
                                <a href="https://eqf.com.mx/quienes-somos/" target="_blank">
                                Explora nuestra historia, misión y los valores que nos definen como equipo.
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auth-form-panel">
                <div class="auth-form-wrapper">
                    <div class="auth-header">
                        <div class="auth-logo">
                            <img src="<?= asset('img/ServiceHub_logo.png'); ?>" alt="ServiceHub Logo">
                        </div>
                        <h2 class="auth-title">BIENVENIDO</h2>
                        <p class="auth-subtitle">
                            Inicia sesión para continuar en <?= APP_NAME; ?>.
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

<form action="<?= route('process-login'); ?>" method="POST">                        <div class="form-group">
                            <label for="email" class="form-label">Email corporativo</label>
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
<a href="<?= route('forgot-password'); ?>" class="link-primary">¿Olvidaste tu contraseña?</a>
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
                            <span>Mantener sesión activa</span>
                        </label>

                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>

                    <p class="auth-footer">
                        © <?= date('Y'); ?> <?= APP_NAME; ?>. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <script src="<?= asset('js/auth.js'); ?>"></script>
</body>
</html>