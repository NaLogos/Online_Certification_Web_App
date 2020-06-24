<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exam;
use App\Category;

class BrowseExamsController extends Controller
{
    public function index(){
        $exams = Exam::all();
        $categories = Category::all();
        return view('client.browseExams', compact('exams','categories'));
    }
}
