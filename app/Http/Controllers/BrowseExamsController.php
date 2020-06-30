<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exam;
use App\Category;
use App\Tag;

class BrowseExamsController extends Controller
{
    public function index(){
        $exams = Exam::searched()->simplePaginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        return view('client.browseExams', compact('exams','categories', 'tags'));
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

    public function category(Category $category){
    
        $exams = $category->categoryExams()->searched()->simplePaginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        return view('exam.category', compact('category', 'exams', 'categories', 'tags'));
    }

    public function tag(Tag $tag){
        $exams = $tag->exams()->searched()->simplepaginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        return view('exam.tag', compact('tag', 'exams', 'categories', 'tags'));
    }
}
