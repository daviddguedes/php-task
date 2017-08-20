@extends('layout')

@section('content')
    <div class="container">
        <div class="well">
            <h5>Hello!</h5>

            @if (!Auth::check())
                <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
            @endif

            <table class="table table-striped" style="margin-top: 2em;">
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                </tr>

                <tr>
                    <td>jamesbond@007.uk</td>
                    <td>manatwork</td>
                </tr>

                <tr>
                    <td>bonovox@u2.ir</td>
                    <td>withorwithoutyou</td>
                </tr>
            </table>
        </div>
    </div>
@endsection()