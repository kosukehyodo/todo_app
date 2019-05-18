@extends('layouts.app')

@section('header_menu')
@parent

@if (isset($board))
<a class="text-muted mr-5">{{ $board->title }}</a>
@endif

@if (Auth::check())
<a class="btn btn-outline-primary" href="{{ route('user.logout') }}"
    onclick='return confirm("Are you sure you want to logout?");'>Logout</a>
@endif
@stop

<body class="{{$board->color}}">
    @section('content')
    <div id="app">
        <card-list
        :board-id="{{json_encode($board->id)}}">
        </card-list>
    </div>
    @endsection
</body>