@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    You are logged in Mr/Ms {{$user->name}}
                </div>
            </div>

            @if(count($currentUntakenSessions) > 0)
                <div class="card card-default">
                    <div class="card-header">
                        Current Sessions
                    </div>
                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Session</th>
                                <th></th>
                            </thead>


                            <tbody>
                                @foreach($currentUntakenSessions as $session)
                                    <tr>
                                        <td>
                                            <img src="{{asset($session->exam->image)}}" width="120px" height="80px" alt="img"/>
                                        </td>
                                        <td>
                                            {{ $session->exam->title }}
                                        </td>
                                        <td>
                                            <a href="">
                                                {{ $session->exam->category->name }}
                                            </a>
                                        </td>
                                            <td>
                                                {{date_format($session->active_at, 'g:ia \o\n l jS F Y')}}
                                            </td>
                                        
                                        <td>
                                            <a href="{{ route('client.test', $session->id) }}" class="btn btn-success btn-sm">Pass Exam</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            
            @endif


            @if($upcomingSessions->count() > 0)
                <div class="card card-default  mt-4">
                    <div class="card-header">
                        Upcoming Sessions
                    </div>
                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Session</th>
                                <th></th>
                            </thead>


                            <tbody>
                                @foreach($upcomingSessions as $session)
                                    <tr>
                                        <td>
                                            <img src="{{asset($session->exam->image)}}" width="120px" height="80px" alt="img"/>
                                        </td>
                                        <td>
                                            {{ $session->exam->title }}
                                        </td>
                                        <td>
                                            <a href="">
                                                {{ $session->exam->category->name }}
                                            </a>
                                        </td>
                                        
                                        <td>
                                            {{date_format($session->active_at, 'g:ia \o\n l jS F Y')}}
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown mt-2">
                                
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Change Sessions
                                                </button>
                                                
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <form action="{{route('client.registering')}}" method="POST">
                                                    @csrf
                                            
                                                    @foreach($session->exam->activeSessions as $session)
                                                    <input type="hidden" name="exam_id" value="{{ $session->exam->id }}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="session" id="session" value="{{$session->id}}" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                        {{$session->active_at}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    
                                                    <button class="btn btn-sm btn-block btn-primary mt-4">Confirm registration</button>
                                                </form>
                                            
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            @else
                <div class="card card-default mb-4">
                    <div class="card-body">
                        <h3 class="text-center">You have no upcoming exams</h3> 
                    </div>
                </div>    
            @endif


            @if($results->count() > 0)
                <div class="card card-default mt-4">
                    <div class="card-header">
                        Past Sessions
                    </div>
                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Session</th>
                                <th>Score</th>
                                
                            </thead>


                            <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>
                                            <img src="{{asset($result->session->exam->image)}}" width="120px" height="80px" alt="img"/>
                                        </td>
                                        <td>
                                            {{ $result->session->exam->title }}
                                        </td>
                                        <td>
                                            <a href="">
                                                {{ $result->session->exam->category->name }}
                                            </a>
                                        </td>
                                        
                                        <td>
                                            {{date_format($result->session->active_at, 'g:ia \o\n l jS F Y')}}
                                        </td>
                                        
                                        <td>
                                            {{$result->total_points}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            @else
                <div class="card card-default mt-4">
                    <div class="card-body">
                        <h3 class="text-center">You have no past exams</h3> 
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection