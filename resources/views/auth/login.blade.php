@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
                {!! Form::open(['url' => 'login', 'method' => 'POST', 'id' => 'form-login']) !!}
                <div class="form-group">
                    <label for="name">Name</label>
                    {{ Form::text('email', old('email'), [
                                    'class'=>'form-control',
                                    'id' => 'name',
                                    'required' => 'required',
                                    'placeholder'=>'jamesbond@007.uk'
                                ]) }}
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    {{ Form::password('password', [
                                    'class'=>'form-control',
                                    'id' => 'password',
                                    'required' => 'required',
                                    'placeholder'=>'manatwork'
                                ]) }}
                </div>

                <button type="submit" class="btn btn-default">Sign In</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection()