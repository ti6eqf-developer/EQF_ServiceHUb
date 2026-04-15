<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../core/session.php';

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
    <title>Recover Password | <?= APP_NAME; ?></title>
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/assets/css/global.css">
</head>
<body>
    <main class="auth-page">
        <section class="auth-shell" style="max-width: 520px;">
            <div class="auth-form-panel" style="padding: 2rem;">
                <div class="auth-form-wrapper">
                    <div class="auth-header text-center">
                        <div class="auth-logo" style="margin-left:auto; margin-right:auto; background: rgba(110, 28, 92, 0.1); color: var(--eqf-purple);">SH</div>
                        <h1 class="auth-title">Que pendejooooo!!</h1>
                        <p class="auth-subtitle">
                            Enter your corporate email to continue with password recovery.
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

                    <form action="processForgotPassword.php" method="POST">
                        <div class="form-group">
                            <label for="email" class="form-label">Corporate email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="<?= htmlspecialchars($oldEmail); ?>"
                                placeholder="name@company.com"
                                required
                                class="form-input"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Send recovery request</button>

                        <div class="mt-16 text-center">
                            <a href="login.php" class="link-primary">Back to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>