@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{ $threads->creator->name }}</a>
                        posted:
                        {{ $threads->title }}</div>

                    <div class="card-body">
                        <article>

                                <div class="body">{{$threads->body}}</div>

                            </article>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($threads->replies as $reply)
                @include('threads.reply')
                @endforeach
            </div>
        </div>

      @if(auth()->check())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{$threads->path().'/replies'}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center">Please <a href="{{route('login')}}">signin</a> to post</p>
        @endif

    </div>
@endsection
