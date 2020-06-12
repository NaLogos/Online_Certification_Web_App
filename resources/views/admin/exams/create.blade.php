@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Exam
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">Category</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            
            <div class="form-group">
                <label class="required" for="exam_title">Title</label>
                <input class="form-control {{ $errors->has('exam_title') ? 'is-invalid' : '' }}" name="exam_title" id="exam_title"  type="text" value="{{ isset($exam) ? $exam->title : '' }}">
            </div>

            <!-- @if(isset($exam))
                <div class="form-group">
                    <img src="{{asset($exam->image)}}" alt="" style="width:100%">
                </div>
            @endif -->

            <div class="form-group">
                <label class="required" for="exam_image">Image</label>
                <input name="exam_image" id="exam_image" class="form-control" type="file">
            </div>
            
            <div class="form-group">
                <label class="required" for="exam_description">Description</label>
                <textarea class="form-control {{ $errors->has('exam_description') ? 'is-invalid' : '' }}" name="exam_description" id="exam_description" required></textarea>
                @if($errors->has('exam_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exam_description') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection