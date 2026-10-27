<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($quiz)
    {
        return response()->json(['message' => "Lista pytań dla quizu: {$quiz}"]);
    }

    public function create($quiz)
    {
        return response()->json(['message' => "Formularz dodawania pytania do quizu: {$quiz}"]);
    }

    public function store(Request $request, $quiz)
    {
        return response()->json(['message' => "Dodano pytanie do quizu: {$quiz}"]);
    }

    public function show($quiz, $question)
    {
        return response()->json(['message' => "Szczegóły pytania: {$question}"]);
    }

    public function edit($quiz, $question)
    {
        return response()->json(['message' => "Formularz edycji pytania: {$question}"]);
    }

    public function update(Request $request, $quiz, $question)
    {
        return response()->json(['message' => "Zaktualizowano pytanie: {$question}"]);
    }

    public function destroy($quiz, $question)
    {
        return response()->json(['message' => "Usunięto pytanie: {$question}"]);
    }
}
