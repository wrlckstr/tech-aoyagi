@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>商品詳細 ID:{{$item_detail->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control bg-white" id="name" name="name" value="{{$item_detail->name}}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="produce">産地</label>
                            <input type="text" class="form-control bg-white" id="produce" name="produce" value="{{$item_detail->produce}}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="type">種別</label>
                            <input type="text" class="form-control bg-white" id="type" name="type" value="@switch($item_detail->type) 
                                        @case (1) 果物
                                            @break 
                                        @case (2) 野菜
                                            @break 
                                        @case (3) きのこ
                                            @break 
                                        @case (4) その他
                                            @break 
                                        @endswitch" readonly>
                        </div>

                        <div class="form-group">
                            <label for="variety">品種</label>
                            <input type="text" class="form-control bg-white" id="variety" name="variety" value="{{$item_detail->variety}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control bg-white" id="price" name="price" value="{{$item_detail->price}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea class="form-control bg-white" id="detail" rows="5" name="detail"readonly>{!!nl2br($item_detail->detail)!!}
                            </textarea>
                        </div>

                        <div class="row"><!--ここから-->
                        <div class="form-group col-auto">
                            <label for="add_user">登録者 </label>
                            <input type="text" class="form-control bg-white" id="add_user" name="add_user" value="{{$detail_user -> name }} " readonly>
                        </div>

                        <div class="form-group col-auto">
                            <label for="update_user">最終更新者</label>
                            <input type="text" class="form-control bg-white" id="update_user" name="update_user" value="{{$detail_user_update->name}}" readonly>
                        </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-auto">
                            <label for="update_user">登録日時</label>
                            <input type="text" class="form-control bg-white" id="update_user" name="update_user" value="{{$item_detail->created_at}} " readonly>
                        </div>
                        <div class="form-group col-auto">
                            <label for="update_user">更新日時</label>
                            <input type="text" class="form-control bg-white" id="update_user" name="update_user" value="{{$item_detail->updated_at}} " readonly>
                        </div>
                        </div><!--ここまで-->
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
