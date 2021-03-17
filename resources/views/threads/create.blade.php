@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new thread') }}</div>

                    <div class="card-body">
                        <form action="/threads" method="POST">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="channel_id">Choose a Channel:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">Choose One...</option>

                                    @foreach (App\Models\Channel::all() as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="Body">Body</label>
                                <textarea name="body" id="body" cols="30" class="form-control" rows="5">{{old('body')}}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>


                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
