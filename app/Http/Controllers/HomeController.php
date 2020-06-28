<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = auth()->user();
        
        // $exams = $user->exams;
        


        // foreach($exams as $exam){
        //     $a = $exam->id;
        //     $x = $user->whereHas('exam_session_user',function($query)use($a){
        //         $query->where('exam_session_user.exam_id','=',$a);
        //     });
    
        //     dd($x);
        // }
        
        // return view('client.home', compact('user', 'sessions', 'exams'));
        return view('client.home');
    }

    public function redirect()
    {
        if (auth()->user()->is_admin || auth()->user()->is_expert) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('client.home')->with('status', session('status'));
    }
}
