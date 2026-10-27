<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminQuizController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Panel administratora: aktywny quiz o grach wideo.',
                'access_granted' => true,
            ]);
        }

        return view('admin.quizzes');
    }
}
