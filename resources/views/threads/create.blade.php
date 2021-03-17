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
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="Body">Body</label>
                                <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish</button>


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
