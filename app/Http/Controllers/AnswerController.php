<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function store(Request $request, Question $question)
    {
        // validate answer
        $request->validate([
            'newAnswer' => 'required|string|max:1900',
        ]);

        // create answer
        $question->answers()->create([
            'content' => $request->newAnswer,
            'user_id' => auth()->id(),
        ]);

        // go to questions view
        return back();
    }
}
