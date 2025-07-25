<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Ramsey\Uuid\Type\Integer;

class MainController extends Controller
{
    private array $app_data;

    public function __construct() {
        // load app_data file from app folder
        $this->app_data = require(app_path('app_data.php'));
    }

    public function startGame(): View
    {
        return view('home');
    }

    public function prepareGame(Request $request): void
    {
        // validate request
        $request->validate(
            [
                'total_questions' => 'required|integer|min:3|max:30'
            ],
            [
                'total_questions.required' => 'O número de questões é obrigatório',
                'total_questions.integer' => 'O número de questões tem que ser do tipo inteiro',
                'total_questions.min' => 'Deve haver no mínimo :min questões',
                'total_questions.max' => 'Deve haver no máximo :max questões',
            ]
        );

        // get total_questions
        $total_questions = intval($request->input('total_questions'));

        // prepare all the quiz structure
        $quiz = $this->prepareQuiz($total_questions);

        dd($quiz);
    }

    private function prepareQuiz(int $total_questions): void
    {
        # code...
    }
}
