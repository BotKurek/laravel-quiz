<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora • Quiz o Grach</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen py-10 px-4">
    <div class="max-w-3xl mx-auto space-y-6">

        <!-- Nagłówek panelu -->
        <div class="flex items-center justify-between pb-6 border-b border-slate-800">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-semibold mb-2">
                    ✓ Autoryzacja pomyślna (Middleware: CheckAdminAccess)
                </div>
                <h1 class="text-2xl font-bold text-white tracking-tight">Panel Administratora</h1>
                <p class="text-slate-400 text-sm">Strefa chroniona – dostęp przyznany z parametrem administratora.</p>
            </div>
            <a href="/" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-semibold transition">
                &larr; Wróć do quizu
            </a>
        </div>

        <!-- Karta statusu i weryfikacji middleware -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 space-y-1">
                <span class="text-xs uppercase tracking-wider text-slate-500 font-bold">Własny Middleware</span>
                <div class="text-lg font-bold text-emerald-400">CheckAdminAccess</div>
                <p class="text-xs text-slate-400">Blokuje nieautoryzowane żądania kodem 403 Forbidden</p>
            </div>
            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 space-y-1">
                <span class="text-xs uppercase tracking-wider text-slate-500 font-bold">Logowanie Zdarzeń</span>
                <div class="text-lg font-bold text-violet-400">storage/logs/laravel.log</div>
                <p class="text-xs text-slate-400">Zapisano adres IP, metodę i URL żądania</p>
            </div>
        </div>

        <!-- Aktywny Quiz -->
        <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-semibold text-white">Aktywny quiz w aplikacji</h2>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                    Aktywny
                </span>
            </div>

            <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 flex items-center justify-between">
                <div class="space-y-1">
                    <div class="font-semibold text-white text-sm">🎮 Quiz o Grach Wideo</div>
                    <div class="text-xs text-slate-400">Kategoria: Gry komputerowe • 4 pytania jednokrotnego wyboru</div>
                </div>
                <span class="text-xs font-mono text-slate-500 bg-slate-900 px-2 py-1 rounded border border-slate-800">
                    GET /quiz
                </span>
            </div>
        </div>

    </div>
</body>
</html>
