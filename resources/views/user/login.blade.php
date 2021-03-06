@extends('layouts.app')

@section('header_menu')
@parent
<a class="btn btn-outline-primary mr-4" href="{{ route('user.create') }}">Registor</a>
@stop
@section('content')

@if(session('message') == "Failed to login!")
<div class="alert alert-danger alert-dismissible fade show" id="close" role="alert">
    @elseif(session('message') == "Success to Regist!")
    <div class="alert alert-success alert-dismissible fade show" id="close" role="alert">
        @endif
        {{ session('message') }}
    </div>
    <div class="jumbotron mt-5 mx-auto" style="width:700px; height: 400px;">
        <div class="container">
            <h2>Sign In</h2>
            @if(count($errors) >0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('user.signup') }}" method="post" class="mt-3">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control" style="width:600px;">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" style="width:600px;">
                </div>
                <div class="text-center">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    @endif
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary mt-3">login</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <script>
        jQuery(function($) {
            $("#close").on("click", function() {
                $("#close").fadeOut();
            });
        });
    </script>
    @endsection