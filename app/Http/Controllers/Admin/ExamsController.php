<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('exam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exams = Exam::all();

        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exams)
    {
        //
    }
}
