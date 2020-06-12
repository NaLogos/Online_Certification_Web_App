@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="exam_id">Exam</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="exam_id" id="exam_id" required>
                    @foreach($exams as $id => $exam)
                        <option value="{{ $id }}" {{ old('exam_id') == $id ? 'selected' : '' }}>{{ $exam }}</option>
                    @endforeach
                </select>
                @if($errors->has('exam_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exam_id') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
                <textarea class="form-control {{ $errors->has('question_text') ? 'is-invalid' : '' }}" name="question_text" id="question_text" required>{{ old('question_text') }}</textarea>
                @if($errors->has('question_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_text_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection