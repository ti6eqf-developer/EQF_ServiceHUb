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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/assets/css/auth.css">
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <main class="flex min-h-screen items-center justify-center px-4 py-8">
        <section class="grid w-full max-w-6xl overflow-hidden rounded-3xl bg-white shadow-2xl lg:grid-cols-2">
            <div class="hidden lg:flex flex-col justify-between bg-gradient-to-br from-[#14378A] to-[#6E1C5C] p-10 text-white">
                <div>
                    <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-medium backdrop-blur">
                        EQF ServiceHub
                    </span>
                    <h1 class="mt-6 text-4xl font-bold leading-tight">
                        Centralized support and operational visibility.
                    </h1>
                    <p class="mt-4 max-w-md text-sm text-slate-100/90">
                        Access your workspace, submit IT requests, track progress, and review key operational indicators from a single platform.
                    </p>
                </div>

                <div class="grid gap-4">
                    <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                        <p class="text-sm font-semibold">Secure access</p>
                        <p class="mt-1 text-sm text-slate-100/85">Role-based entry, session control, and protected modules.</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                        <p class="text-sm font-semibold">Responsive design</p>
                        <p class="mt-1 text-sm text-slate-100/85">Optimized for desktop first, with support for phones and tablets.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center p-6 sm:p-10">
                <div class="w-full max-w-md">
                    <div class="mb-8 text-center lg:text-left">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#14378A]/10 lg:mx-0">
                            <span class="text-xl font-bold text-[#14378A]">SH</span>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-900">BIENVENIDO</h2>
                        <p class="mt-2 text-sm text-slate-500">
                            Inicia sesión para continuar en <?= APP_NAME; ?>.
                        </p>
                    </div>

                    <?php if ($errorMessage): ?>
                        <div class="mb-4 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            <?= htmlspecialchars($errorMessage); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($successMessage): ?>
                        <div class="mb-4 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            <?= htmlspecialchars($successMessage); ?>
                        </div>
                    <?php endif; ?>

                    <form action="processLogin.php" method="POST" class="space-y-5">
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                                Email Corporativo
                            </label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="<?= htmlspecialchars($oldEmail); ?>"
                                placeholder="name@company.com"
                                required
                                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#14378A] focus:ring-4 focus:ring-[#14378A]/10"
                            >
                        </div>

                        <div>
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <label for="password" class="block text-sm font-medium text-slate-700">
                                    Contraseña
                                </label>
                                <a href="forgotPassword.php" class="text-sm font-medium text-[#6E1C5C] hover:underline">
                                    ¿Olvidate tu contraseña?
                                </a>
                            </div>

                            <div class="relative">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Enter your password"
                                    required
                                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 pr-14 text-sm outline-none transition focus:border-[#14378A] focus:ring-4 focus:ring-[#14378A]/10"
                                >
                                <button
                                    type="button"
                                    id="togglePassword"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 rounded-xl px-2 py-1 text-xs font-semibold text-slate-500 transition hover:bg-slate-100 hover:text-slate-700"
                                >
                                    Show
                                </button>
                            </div>
                        </div>

                        <label class="flex items-center gap-3 text-sm text-slate-600">
                            <input
                                type="checkbox"
                                name="rememberSession"
                                value="1"
                                class="h-4 w-4 rounded border-slate-300 text-[#14378A] focus:ring-[#14378A]"
                            >
                            Mantener sesion iniciada
                        </label>

                        <button
                            type="submit"
                            class="w-full rounded-2xl bg-[#14378A] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#102d72] focus:outline-none focus:ring-4 focus:ring-[#14378A]/20"
                        >
                            Iniciar Sesion
                        </button>
                    </form>

                    <p class="mt-6 text-center text-xs text-slate-400 lg:text-left">
                        © <?= date('Y'); ?> <?= APP_NAME; ?>. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <script src="<?= APP_URL; ?>/public/assets/js/auth.js"></script>
</body>
</html>