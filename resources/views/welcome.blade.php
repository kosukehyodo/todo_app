@extends('layouts.app')

@section('header_menu')
@parent
@if (isset($users))
<a class="text-muted mr-5">Welcome to {{ $users->name }} !!</a>
@endif

@if (Auth::check())
<a class="btn btn-outline-primary" href="{{ route('user.logout') }}">Logout</a>
@endif
@stop

<link rel="stylesheet" href="{{ asset('/css/styles.css') }}">

@section('content')
<div class="pricing-header pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-5">My Board</h1>
</div>
<div class="row" style="margin-left:21px">
    <div class="card mt-4 mr-5" data-toggle="modal" data-target="#myModal" style="width:20rem;">
        <div class="card-body">
            <h3>New Board</h3>
        </div>
    </div>
    @if (isset($users))
    @foreach($users->boards as $board)
    <div class="card mt-4 mr-5" style="width:20rem;">
        <div class="card-body cord-color" id="{{$board->color}}">
            <h3>{{$board->title}}</h3>
        </div>
    </div>
    @endforeach
    @endif
</div>
<!-- モーダルの設定 -->
<form action="{{ route('board.store') }}" method="post">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="text" id="board_title" name="title" class="form-control" placeholder="Board title">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-2 ml-1 text-muted">Board Color</p>
                    <div class="row">
                        <div class="btn-group mb-3 color" data-toggle="buttons">
                            <label class="btn ml-4 color" style="width:80px; height:40px; background-color:#006699;">
                                <input type="radio" name="color" value="blue">
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#FFEEFF;">
                                <input type="radio" name="color" value="pink">
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#FFFFCC;">
                                <input type="radio" name="color" value="yellow">
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#EEEEEE;">
                                <input type="radio" name="color" value="glay">
                            </label>
                        </div>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#FFDBC9;">
                                <input type="radio" name="color" value="orange">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" id="btn" value="Save" class="btn btn-primary mr-4">
                </div><!-- /.modal-footer -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{ csrf_field() }}
</form>
<script>
    <?php if (isset($board)): ?>
    window.onload = function() {
        var color = document.getElementById('{{$board->color}}');
        switch (color.id) {
            case 'blue':
                color.style.backgroundColor = '006699';
                break;

            case 'pink':
                color.style.backgroundColor = 'FFEEFF';
                break;

            case 'yellow':
                color.style.backgroundColor = 'FFFFCC';
                break;

            case 'glay':
                color.style.backgroundColor = 'EEEEEE';
                break;

            case 'orange':
                color.style.backgroundColor = 'FFDBC9';
                break;
        }
    }
    <?php endif; ?>
</script>
@endsection