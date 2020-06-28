<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exam;
use App\Category;

class BrowseExamsController extends Controller
{
    public function index(){
        $exams = Exam::all();
        $categories = Category::all();
        dd($exams->sessions);
        return view('client.browseExams', compact('exams','categories'));
    }

    public function registering(Request $request)
    {
        $user = Auth::user();
        $exam = Exam::find($request->exam);
        $user->exams()->sync($exam, array('session_id'=>$request->session));
        session()->flash('success', 'Registered Successfully');
        return redirect('browse');
    }
}
