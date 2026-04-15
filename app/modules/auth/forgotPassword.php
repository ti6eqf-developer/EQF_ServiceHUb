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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <main class="flex min-h-screen items-center justify-center px-4 py-8">
        <section class="w-full max-w-md rounded-3xl bg-white p-6 shadow-2xl sm:p-8">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#6E1C5C]/10">
                    <span class="text-xl font-bold text-[#6E1C5C]">SH</span>
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Recover password</h1>
                <p class="mt-2 text-sm text-slate-500">
                    Enter your corporate email to continue with password recovery.
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

            <form action="processForgotPassword.php" method="POST" class="space-y-5">
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                        Corporate email
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

                <button
                    type="submit"
                    class="w-full rounded-2xl bg-[#14378A] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#102d72]"
                >
                    Send recovery request
                </button>

                <a
                    href="login.php"
                    class="block text-center text-sm font-medium text-[#6E1C5C] hover:underline"
                >
                    Back to login
                </a>
            </form>
        </section>
    </main>
</body>
</html>