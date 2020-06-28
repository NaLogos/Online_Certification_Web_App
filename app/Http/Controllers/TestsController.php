<?php

namespace App\Http\Controllers;
use App\Option;
use App\Question;
use App\Exam;
use App\Http\Requests\StoreTestRequest;
use Illuminate\Support\Arr;


class TestsController extends Controller
{
    public function index(Exam $exam)
    {
            $randomQestions = $exam->examQuestions->random(3);
            return view('client.takeExam', compact('exam','randomQestions'));
            
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points')
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
