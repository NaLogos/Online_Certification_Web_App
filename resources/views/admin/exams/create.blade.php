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
                    @if(count($categories) > 0)
                        <select name="category_id" id="category_id" class="form-control tag-selector2 {{ $errors->has('category') ? 'is-invalid' : '' }}" required>
                            @foreach($categories as $id => $category)
                                <option value="{{$id}}">
                                    {{$category}}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <h2 class="form-control">No Tags Available</h2>
                    @endif
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                @if(count($tags) > 0)
                    <select name="tags[]" id="tags" class="form-control tag-selector2" multiple>
                        @foreach($tags as $id => $tag)
                            <option value="{{$id}}">
                                {{$tag}}
                            </option>
                        @endforeach
                    </select>
                @else
                    <h2 class="form-control">No Tags Available</h2>
                @endif
            </div>
            
            <div class="form-group">
                <label class="required" for="exam_title">Title</label>
                <input class="form-control {{ $errors->has('exam_title') ? 'is-invalid' : '' }}" name="exam_title" id="exam_title"  type="text" value="{{ isset($exam) ? $exam->title : '' }}">
            </div>

            <div class="form-group">
                <label for="sessions">Sessions</label>
                <input name="sessions" id="sessions" class="form-control" type="text" value="">
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

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#sessions',{
            enableTime: true,
            enableSeconds: true,
            mode: "multiple",
            })

         $(document).ready(function() {
            $('.tag-selector2').select2();
        });

    </script>
@endsection