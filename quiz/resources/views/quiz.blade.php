<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quizTitle }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen py-10 px-4">
    <div class="max-w-2xl mx-auto space-y-6">

        <!-- Nagłówek quizu -->
        <header class="text-center space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-violet-500/10 text-violet-400 border border-violet-500/20 text-xs font-semibold">
                🎮 Quiz o grach komputerowych
            </div>
            <h1 class="text-3xl font-bold text-white tracking-tight">{{ $quizTitle }}</h1>
            <p class="text-slate-400 text-sm">Odpowiedz na poniższe pytania i sprawdź swoją wiedzę ze świata gier.</p>
        </header>

        <!-- Wynik po przesłaniu -->
        @if ($result)
            <div class="p-5 rounded-2xl border {{ $result['percentage'] >= 75 ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-300' : 'bg-amber-500/10 border-amber-500/30 text-amber-300' }} text-center space-y-1">
                <div class="text-lg font-bold">
                    Twój wynik: {{ $result['score'] }} / {{ $result['total'] }} ({{ $result['percentage'] }}%)
                </div>
                <p class="text-xs opacity-90">
                    {{ $result['percentage'] >= 75 ? 'Świetny wynik! Znasz się na grach!' : 'Niezła próba! Możesz spróbować ponownie.' }}
                </p>
            </div>
        @endif

        <!-- Formularz z pytaniami -->
        <form action="{{ route('quiz.submit') }}" method="POST" class="space-y-5">
            @csrf

            @foreach ($questions as $index => $q)
                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="w-7 h-7 rounded-lg bg-violet-600/30 text-violet-300 text-xs font-bold flex items-center justify-center shrink-0">
                            {{ $index + 1 }}
                        </span>
                        <h2 class="text-base font-semibold text-white pt-0.5">
                            {{ $q['question'] }}
                        </h2>
                    </div>

                    <div class="space-y-2 pl-10">
                        @foreach ($q['options'] as $key => $opt)
                            @php
                                $isChecked = isset($result['answers'][$q['id']]) && $result['answers'][$q['id']] === $key;
                                $isCorrect = $result && $q['correct'] === $key;
                                $isUserWrong = $result && $isChecked && !$isCorrect;
                            @endphp
                            <label class="flex items-center gap-3 p-3 rounded-xl border cursor-pointer transition text-sm
                                @if($isCorrect)
                                    bg-emerald-500/10 border-emerald-500 text-emerald-300
                                @elseif($isUserWrong)
                                    bg-rose-500/10 border-rose-500 text-rose-300
                                @else
                                    bg-slate-950/60 border-slate-800 hover:border-slate-700 text-slate-300
                                @endif
                            ">
                                <input type="radio" name="answers[{{ $q['id'] }}]" value="{{ $key }}" class="text-violet-600 focus:ring-violet-500" {{ $isChecked ? 'checked' : '' }} required>
                                <span>{{ $opt }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="pt-2 text-center">
                <button type="submit" class="w-full sm:w-auto px-8 py-3 rounded-xl bg-violet-600 hover:bg-violet-500 text-white font-semibold shadow-lg shadow-violet-600/30 transition">
                    {{ $result ? 'Rozwiąż ponownie' : 'Zatwierdź odpowiedzi' }}
                </button>
            </div>
        </form>

        <!-- Test middleware -->
        <footer class="pt-6 border-t border-slate-800/80 text-center text-xs text-slate-500 space-y-2">
            <div>Własny middleware ograniczający dostęp (CheckAdminAccess):</div>
            <div class="flex justify-center gap-3">
                <a href="/admin/quiz" target="_blank" class="text-amber-400 hover:underline">
                    🛡️ Test blokady dostępu (403 Forbidden)
                </a>
                <span>•</span>
                <a href="/admin/quiz?admin=1" target="_blank" class="text-emerald-400 hover:underline">
                    🔑 Test dostępu administratora (200 OK)
                </a>
            </div>
        </footer>

    </div>
</body>
</html>
