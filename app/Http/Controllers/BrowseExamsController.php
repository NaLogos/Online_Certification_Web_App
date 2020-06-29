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
        return view('client.browseExams', compact('exams','categories'));
    }

    public function registering(Request $request)
    {
        
        $user = Auth::user();
        $oldSession = $user->sessions->where('exam_id', '=', $request->exam_id)->first();
        if($oldSession){
            if( $oldSession->id != $request->session ){
                $user->sessions()->toggle([$oldSession->id, $request->session]);
            }
        }else{
            $user->sessions()->attach($request->session);
        }
        
        session()->flash('success', 'Registered Successfully');
        return redirect()->back();
    }
}
