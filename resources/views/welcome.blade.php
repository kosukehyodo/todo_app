@extends('layouts.app')

@section('header_menu')
@parent
@if (isset($users))
<a class="text-muted mr-5">Welcome to {{ $users->name }} !!</a>
@endif

@if (Auth::check())
<a class="btn btn-outline-primary" href="{{ route('user.logout') }}" onclick='return confirm("Are you sure you want to logout?");'>Logout</a>
@endif
@stop

@section('content')
<div class="pricing-header pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-5">My Board</h1>
</div>
<div class="row" style="margin-left:21px">
    <div class="card mt-4 mr-5" data-toggle="modal" data-target="#myModal" style="width:20rem; color:black;">
        <div class="card-body">
            <h3 class="text-muted">New Board</h3>
        </div>
    </div>
    @if (isset($users))
    @foreach($users->boards as $board)
    <a class="a_invalid" href="{{ route('board.show', $board->id) }}">
        <div class="card mt-4 mr-5" style="width:20rem;">
            <div class="card-body {{ $board->color }}">
                <h3>{{$board->title}}</h3>
                <form action="{{ route('board.destroy', $board->id) }}" id="form_{{ $board->id }}" method="post">
                    <a href="#" data-id="{{ $board->id }}" id="relative" class="btn btn-danger float-right btn-sm"
                        onclick="deletePost(this);">Delete</a>
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                </form>
            </div>
        </div>
    </a> @endforeach @endif
</div> <!-- モーダルの設定 -->
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
    function deletePost(e) {
        'use strict';

        if (confirm('What really sure you want to delete?')) {
            document.getElementById('form_' + e.dataset.id).submit();
        }
    }
</script>
@endsection