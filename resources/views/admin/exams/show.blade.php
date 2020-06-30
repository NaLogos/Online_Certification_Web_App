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
                            Exam Title
                        </th>
                        <td>
                            {{ $exam->title }}
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
                            Related Tags
                        </th>
                        <td>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    @foreach($exam->tags as $tag)
                                        <td  style="text-align:center">
                                            {{$tag->name}}
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Planned Sessions
                        </th>
                        <td>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    @foreach($exam->examSessions as $session)
                                        <td style="text-align:center">
                                            {{date_format($session->active_at, 'g:ia \o\n l jS F Y')}}
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
                            <img style="max-width: 100%;max-height: 100%"  src="{{asset($exam->image)}}" alt="img"/>
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