@extends('layouts.app')

@section('header_menu')
@parent
@if (isset($user))
<p>Welcome to {{ $user->name }} !!</p>
@else
@endif
@stop

@section('content')
<div style="margin-top: 30px; text-align: center;">
  <h3>ログイン成功！</h3>
</div>
@endsection