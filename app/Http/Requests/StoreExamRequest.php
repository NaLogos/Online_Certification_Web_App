<?php

namespace App\Http\Requests;

use App\Exam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreExamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'category_id'   => [
                'required',
                'integer',
            ],
            'exam_title' => [
                'required',
                'unique:exams,title',
            ],
            'exam_image' => [
                'required',
                'image',
            ],
            'exam_description' => [
                'required',
            ],
        ];
    }
}
