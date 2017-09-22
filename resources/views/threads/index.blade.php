@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Threads</div>

                <div class="panel-body">
                  @foreach ($threads as $thread)
                    <article>
                      <h4> <b>Title:</b>
                      <a href="{{$thread->path()}}">{{ $thread->title }}</a>   
                       </h4>
                      <div class="body">
                        <b>Body:</b>  {{$thread->body}}
                      </div>
                    </article>
                    <hr>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
