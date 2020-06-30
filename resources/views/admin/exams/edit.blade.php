@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Exam
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exams.update", $exam->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf


            <div class="form-group">
                <label class="required" for="category_id">Category</label>
                    @if($categories->count() > 0)
                        <select name="category_id" id="category_id" class="form-control tag-selector2 {{ $errors->has('category') ? 'is-invalid' : '' }}" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @if($exam->category->id == $category->id)
                                        selected
                                    @endif
                                >
                                    {{$category->name}}
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
                @if($tags->count() > 0)
                    <select name="tags[]" id="tags" class="form-control tag-selector2" multiple>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"

                                @if($exam->hasTag($tag->id))
                                    selected
                                @endif
                                
                            >
                                {{$tag->name}}
                            </option>
                        @endforeach
                    </select>
                @else
                    <h2 class="form-control">No Tags Available</h2>
                @endif
            </div>

            <div class="form-group">
                <label class="required" for="exam_title">Title</label>
                <input class="form-control {{ $errors->has('exam_title') ? 'is-invalid' : '' }}" name="exam_title" id="exam_title"  type="text" value="{{ old('exam_title', $exam->title) }}">
            </div>

            <div class="form-group">
                
                <th class="form-group">
                    <label for="sessions">Discard Sessions</label>
                </th>
                <td>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            
                            @if($exam->examSessions->count() > 0)
                                <select name="discarded_sessions[]" id="discarded_sessions" class="form-control tag-selector2" multiple>
                                    @foreach($exam->examSessions as $session)
                                        <option value="{{$session->id}}">
                                            {{date_format($session->active_at, 'g:ia \o\n l jS F Y')}}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <h2 class="form-control">No Sessions To Discard</h2>
                            @endif
                        </tbody>
                    </table>
                </td>
                <th class="form-group">
                    <label for="sessions">Add Sessions</label>
                </th>
                    <tbody>
                        <input name="sessions" id="sessions" class="form-control" type="text" value="">
                    </tbody>
                    
            </div>

            
            <div class="form-group">
                <img src="{{asset($exam->image)}}" alt="" style="width:100%">
            </div>
        

            <div class="form-group">
                <label class="required" for="exam_image">Image</label>
                <input name="exam_image" id="exam_image" class="form-control" type="file">
            </div>
            
            <div class="form-group">
                <label class="required" for="exam_description">Description</label>
                <textarea class="form-control {{ $errors->has('exam_description') ? 'is-invalid' : '' }}" name="exam_description" id="exam_description" required>{{ old('exam_description', $exam->description) }}</textarea>
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
        var session_arr = <?php echo json_encode($session_arr); ?>;
        flatpickr('#sessions',{
            enableTime: true,
            enableSeconds: true,
            mode: "multiple",
            defaultDate: session_arr,
            })

         $(document).ready(function() {
            $('.tag-selector2').select2();
        });

    </script>
@endsection