<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    private array $questions = [
        [
            'id' => 1,
            'question' => 'W której grze wcielamy się w postać Geralta z Rivii?',
            'options' => [
                'a' => 'Cyberpunk 2077',
                'b' => 'Wiedźmin 3: Dziki Gon',
                'c' => 'Gothic II',
                'd' => 'The Elder Scrolls V: Skyrim',
            ],
            'correct' => 'b',
        ],
        [
            'id' => 2,
            'question' => 'Jak nazywa się fikcyjne miasto, w którym toczy się akcja gry GTA: Vice City?',
            'options' => [
                'a' => 'Los Santos',
                'b' => 'Liberty City',
                'c' => 'Vice City',
                'd' => 'San Fierro',
            ],
            'correct' => 'c',
        ],
        [
            'id' => 3,
            'question' => 'Które studio stworzyło serię gier Dark Souls oraz Elden Ring?',
            'options' => [
                'a' => 'FromSoftware',
                'b' => 'Bethesda Game Studios',
                'c' => 'CD Projekt RED',
                'd' => 'Ubisoft',
            ],
            'correct' => 'a',
        ],
        [
            'id' => 4,
            'question' => 'Jaki surowiec pozwala wytworzyć najtrwalszy ekwipunek w Minecraft (od wersji 1.16)?',
            'options' => [
                'a' => 'Diament',
                'b' => 'Obsydian',
                'c' => 'Netheryt',
                'd' => 'Szmaragd',
            ],
            'correct' => 'c',
        ],
    ];

    public function index()
    {
        return view('quiz', [
            'quizTitle' => 'Quiz o Grach Wideo',
            'questions' => $this->questions,
            'result' => session('quiz_result'),
        ]);
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers', []);
        $score = 0;
        $total = count($this->questions);

        foreach ($this->questions as $q) {
            $qid = $q['id'];
            if (isset($answers[$qid]) && $answers[$qid] === $q['correct']) {
                $score++;
            }
        }

        return redirect()->route('quiz.index')->with('quiz_result', [
            'score' => $score,
            'total' => $total,
            'percentage' => round(($score / $total) * 100),
            'answers' => $answers,
        ]);
    }
}
