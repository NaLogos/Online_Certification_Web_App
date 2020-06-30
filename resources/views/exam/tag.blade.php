@extends('layouts.client2')

@section('title')
  Online Certification
@endsection

@section('header')
  <!-- Header -->
  <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>Exams</h1>
          <p class="lead-2 opacity-90 mt-6">Choose an Exam and get your certification</p>

        </div>
      </div>

    </div>
  </header><!-- /.header -->
@endsection

@section('content')
  <!-- Main Content -->
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
        @if(session()->has('success'))
                  <div class="alert alert-success mt-3">
                      {{ session()->get('success') }}
                  </div>
              @endif
          <div class="row">

        

            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">


                @forelse($exams as $exam)
                
                    <div class="col-md-6">
                    
                    <div class="card border hover-shadow-6 mb-6 d-block">
                        <img class="card-img-top" src="{{ asset($exam->image) }}" alt="Card image cap">
                        <div class="p-6 text-center">
                        
                            <p>
                                <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                    {{$exam->category->name}}
                                </a>
                            </p>
                            
                            <h5 class="mb-0">
                                <a class="text-dark" href="">
                                    {{$exam->title}}
                                </a>
                            </h5>

                            @if(!$exam->activeSessions->isEmpty())
                              <div class="dropdown mt-2">
                                
                                
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Available Sessions
                                </button>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <form action="{{route('client.registering')}}" method="POST">
                                    @csrf
                              
                                    @foreach($exam->activeSessions as $session)
                                      <input type="hidden" name="exam_id" value="{{ $session->exam->id }}">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="session" id="session" value="{{$session->id}}" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                          {{$session->active_at}}
                                        </label>
                                      </div>
                                    @endforeach
                                    @guest
                                      <a href="/login" class="btn btn-sm btn-block btn-primary mt-4">Login To Confirm <br>Registration</a>
                                    @endguest
                                    @auth
                                    <button class="btn btn-sm btn-block btn-primary mt-4">Confirm registration</button>
                                    @endauth
                                  </form>
                              
                                </div>
                              </div>
                            @else
                                @guest
                                  <a class="btn btn-secondary dropdown-toggle" href="/login" aria-haspopup="true" aria-expanded="false">
                                    Available Sessions
                                  </a>
                                @endguest
                                @auth
                              <button class="btn btn-secondary dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" disabled>
                                No Available Sessions
                              </button>
                              @endauth
                            @endif
                        
                        </div>
                    </div>
                    </div>

                  @empty
                  <p class="text-center">No results found for <strong>{{request()->query('search')}}</strong></p>
                @endforelse

                

              </div>


              {{ $exams->appends([ 'search' => request()->query('search') ])->links() }}
            </div>



            
            @include('partials.sidebar')
          </div>
        </div>
      </div>
    </main>

    <!-- Subscribe 3 -->
    <div class="modal fade" id="modal-subscribe-3" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-img bg-img-bottom" style="background-image: url({{ asset('img/9.jpg') }})">

          <div class="modal-body text-white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="row">
              <div class="col-md-8 ml-auto">
                <form class="input-glass p-5 p-md-7">
                  <h2>Register for a Session</h2>
                  <p class="lead-1">Want to be the first informed about the hottest discounts and promotions? <strong>Subscribe Now!</strong></p>
                  <hr class="w-10">
                  <div class="input-group input-group-lg">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Default radio
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Default radio
                    </label>
                  </div>
                  <button type="button" class="btn btn-success">Success</button>
                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
@endsection



