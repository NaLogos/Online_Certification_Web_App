<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Exam;
use App\Session;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExamRequest;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
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
        abort_if(Gate::denies('exam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exams.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $exam_image = $request->exam_image->store('exams');
        
        $exam = Exam::create([
            'title' => $request->exam_title,
            'description' => $request->exam_description,
            'image' => "storage/".$exam_image,
            'category_id' => $request->category_id
        ]);

        
        if($request->sessions){
            $sessions_arr = explode(', ',$request->sessions);
            foreach($sessions_arr as $session){
                $rec = Session::create([
                    'active_at' => $session,
                    'exam_id'   => $exam->id
                ]);   
            }
            
        }
        
        
        // Case of exam_session_user_pivot_table
        // if($request->sessions){
        //     $data = array();
        //     $sessions_arr = explode(', ',$request->sessions);
        //     foreach($sessions_arr as $session){
        //         $qry = Session::firstWhere('active_at',$session);
        //         if(!$qry){
        //             $rec = Session::create([
        //                 'active_at' => $session
        //             ]);
        //             array_push($data,$rec->id);
        //         }else{
        //             array_push($data,$qry->id);
        //         }    
        //     }
        //     $exam->sessions()->syncWithoutDetaching($data);
            
        // }

        return redirect()->route('admin.exams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        abort_if(Gate::denies('exam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exam->load('category');

        return view('admin.exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        abort_if(Gate::denies('exam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exam->load('category');

        return view('admin.exams.edit', compact('categories', 'exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //fetching request data using only() instead of all() for security reasons
        $data = $request->only(['exam_title','exam_description','category_id']);

        //check if there's a new image 
        if($request->hasFile('exam_image')){
            //upload it
            $exam_image = $request->exam_image->store('exams');
            
            //delete old image
            $exam->deleteImage();

            //Updating Image
            $exam->update([
                'image'       => "storage/".$exam_image
            ]);
        }

    //    if($request->tags){
    //        $post->tags()->sync($request->tags);
    //    }

        //update attributes
        
        $exam->update([
            'title' => $data['exam_title'],
            'description' => $data['exam_description'],
            'category_id' => $data['category_id']
        ]);
        
        if($request->sessions){
            $sessions_arr = explode(', ',$request->sessions);
            foreach($sessions_arr as $session){
                $qry = Session::firstWhere('active_at', '=', $session, 'AND', 'exam_id', '=',$exam->id);
                if(!$qry){
                    $rec = Session::create([
                        'active_at' => $session,
                        'exam_id'   => $exam->id
                    ]);
                }
            }
        

        return redirect()->route('admin.exams.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        abort_if(Gate::denies('exam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exam->deleteImage();
        $exam->delete();

        return back();
    }

    public function massDestroy(MassDestroyExamRequest $request)
    {
        Exam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
