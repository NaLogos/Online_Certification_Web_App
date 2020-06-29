<?php

namespace App\Http\Controllers;
use App\Option;
use App\Question;
use App\Session;
use App\Http\Requests\StoreTestRequest;
use Illuminate\Support\Arr;


class TestsController extends Controller
{
    public function index(Session $session)
    {     
        
        $randomQestions = $session->exam->examQuestions->random(3);
        return view('client.takeExam', compact('session','randomQestions'));
            
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points'),
            'session_id'   => $request->session_id
        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                        'option_id' => $option->id,
                        'points' => $option->points
                    ]
                ];
            })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('client.results.show', $result->id);
    }
}
