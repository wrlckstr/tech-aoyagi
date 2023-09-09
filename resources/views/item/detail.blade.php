@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>商品詳細 ID:{{$item_detail->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

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
                            <label for="vriety">品種</label>
                            <input type="text" class="form-control bg-white" id="variety" name="variety" value="{{$item_detail->variety}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control bg-white" id="price" name="price" value="{{$item_detail->price}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control bg-white" id="detail" name="detail" value="{{$item_detail->detail}}" readonly>
                        </div>
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
