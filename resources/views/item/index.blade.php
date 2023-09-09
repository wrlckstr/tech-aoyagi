@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                <div class="">
                <form class="form-inline" action="{{ route('item.index') }}" method="GET">
                    <div class="form-group">
                        <input type="search" id="search" class="form-control  m-3" name="search" value="{{ $search }}" placeholder="IDと種別以外" aria-label="検索...">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover ">
                        <thead class="table-info">
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>産地</th>
                                <th>種別</th>
                                <th>品種</th>
                                <th>価格</th>
                                <th>編集</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item_info as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->produce }}</td>
                                    <td>
                                        @switch($item->type) 
                                        @case (1) 果物
                                            @break 
                                        @case (2) 野菜
                                            @break 
                                        @case (3) きのこ
                                            @break 
                                        @case (4) その他
                                            @break 
                                        @endswitch
                                    </td>
                                    <td>@if(is_null($item->variety)) No data
                                        @else {{$item->variety}}
                                        @endif
                                    </td>
                                    <td>¥{{ $item->price }}-</td>
                                    <td>
                                        @can ('editor')
                                       <div>
                                            <a href="/items/edit/{{$item -> id}}" class="text-decoration-none text-black">
                                                <button type="submit" class="btn btn-outline-dark">
                                                    編集
                                                </button>
                                            </a>
                                        </div> 
                                        @endcan
                                    </td>
                                    <td>
                                       <div>
                                            <a href="/items/detail/{{$item -> id}}" class="text-decoration-none text-black">
                                                <button type="submit" class="btn btn-outline-dark">
                                                    詳細
                                                </button>
                                            </a>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
