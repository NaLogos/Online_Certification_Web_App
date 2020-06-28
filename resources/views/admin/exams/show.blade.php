@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Exams
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exams.index') }}">
                    Back to list
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $exam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Category
                        </th>
                        <td>
                            {{ $exam->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Exam Title
                        </th>
                        <td>
                            {{ $exam->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Exam Planned Sessions
                        </th>
                        <td>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    @foreach($exam->sessions as $session)
                                        <td>
                                            {{$session->active_at}}
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Exam Image
                        </th>
                        <td>
                            <img src="{{asset($exam->image)}}" alt="img"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Exam Description
                        </th>
                        <td>
                            {{ $exam->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.exams.index') }}">
                    Back to list
                </a>
            </div>
        </div>
    </div>
</div>



@endsection