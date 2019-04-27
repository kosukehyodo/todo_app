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
    <button type="button" class="btn btn-outline-secondary btn-xs" style="width:150px" data-toggle="collapse"
        data-target="#Listcollapse">リストを追加</button>
    <!-- モーダル・ダイアログ -->
    <div class="collapse" id="Listcollapse">
        <div class="card card-body" style="width: 18rem; height:7rem;">
            <form action="{{ route('card_list.store') }}" method="post">
                {{ csrf_field() }}
                <input type="text" id="board_title" name="title" class="form-control" placeholder="List title">
                <input type="submit" class="btn btn-primary btn-xs mt-1" style="margin-left:130px;" value="リストに追加">
            </form>
        </div>
    </div>
    @endsection
</body>