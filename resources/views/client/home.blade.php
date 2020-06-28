@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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

            <div class="card card-default">
                <div class="card-header">
                    Posts
                </div>
                <div class="card-body">
                    @if($exams->count() > 0)
                        <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sessions</th>
                                <th></th>
                            </thead>


                            <tbody>
                                @foreach($ses as $post)
                                    <tr>
                                        <td>
                                            <img src="{{asset($post->image)}}" width="120px" height="80px" alt="img"/>
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $post->category->id) }}">
                                                {{ $post->category->name }}
                                            </a>
                                        </td>
                                        @if($post->trashed())
                                            <td>
                                                <form action="{{route('restore-post',$post->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                                            </td>
                                        @endif
                                        <td>
                                            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif(isset($trashed))
                        <h3 class="text-center">No Trashed Posts</h3>
                    @else
                        <h3 class="text-center">No Posts Yet</h3> 
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection