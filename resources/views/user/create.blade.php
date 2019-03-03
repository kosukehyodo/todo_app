@extends('layouts.app')

@section('content')
<div class="jumbotron mt-5 mx-auto" style="width:700px;">
    <div class="container">
        <h2>Registration</h2>
        <form action="{{ route('user.store') }}" method="post" class="mt-3">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" style="width:600px;">
                @if ($errors->has('name'))
                <span class="error text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" class="form-control" style="width:600px;">
                @if ($errors->has('email'))
                <span class="error text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Passwod</label>
                <input type="password" id="password" name="password" class="form-control" style="width:600px;">
                @if ($errors->has('password'))
                <span class="error text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mt-4">Registor</button>
            </div>
        </form>
    </div>
</div>
@endsection