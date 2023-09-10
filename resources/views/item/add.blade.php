@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="商品名">
                        </div>

                        <div class="form-group">
                            <label for="produce">産地</label>
                            <input type="text" class="form-control" id="produce" name="produce" value="{{old('produce')}}" placeholder="産地">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                                <select name="type" id="type" class="form-select ">
                                        <option value='' disabled selected style='display:none;'>選択してください</option>
                                        <option value="1">果物</option>
                                        <option value="2">野菜</option>
                                        <option value="3">キノコ</option>
                                        <option value="4">その他</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="variety">品種</label>
                            <input type="text" class="form-control" id="variety" name="variety" value="{{old('variety')}}" placeholder="品種">
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="価格">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail"  value="{{old('detail')}}" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
