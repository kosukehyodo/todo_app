@extends('layouts.app')

@section('header_menu')
@parent
@if (isset($user))
<span class="text-muted">Welcome to {{ $user->name }} !!</span>
@endif
<a class="btn btn-outline-primary mr-4" href="{{ route('user.login') }}">Login</a>
<a class="btn btn-outline-primary" href="{{ route('user.add') }}">Registor</a>
@stop

<!-- cssが読み込まれない -->
<!-- <link rel="stylesheet" href="{{ asset('/css/styles.css') }}"> -->

@section('content')
<div class="pricing-header pt-md-5 pb-md-5 mx-auto text-center">
    <h1 class="display-5">My Board</h1>
</div>


<div class="card mt-4" data-toggle="modal" data-target="#myModal" style=" width: 20rem; height: 150px;">
    <div class="card-body">
        <h3>New Board</h3>
    </div>
</div>

<!-- モーダルの設定 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" id="board_title" class="form-control" placeholder="Board title">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-2 ml-1 text-muted">Board Color</p>
                <div class="row">
                    <div class="btn-group mb-3 color" data-toggle="buttons">
                        <label class="btn ml-4 color" style="width:80px; height:40px; background-color:#006699;">
                            <input type="checkbox" class="checkbox" autocomplete="off">
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#FFEEFF;">
                            <input type="checkbox" class="checkbox" autocomplete="off">
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#FFFFCC;">
                            <input type="checkbox" class="checkbox" autocomplete="off">
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#EEEEEE;">
                            <input type="checkbox" class="checkbox" autocomplete="off">
                        </label>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn ml-2 color" style="width:80px; height:40px; background-color:#FFDBC9;">
                            <input type="checkbox" class="checkbox" autocomplete="off">
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary mr-4">Save</button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    jQuery(function($) {
        $(".color").click(function() {
            var color = $(this).css("background-color");
            console.log(color);
        });
        $(".checkbox").on("click", function() {
            $(".checkbox").prop('checked', false); //  全部のチェックを外す
            $(this).prop('checked', true); //  押したやつだけチェックつける
        });

        $("#btn").click(function() {
            var board_title = $("#board_title").val();
            console.log(board_title);
        });
    });
</script>
@endsection