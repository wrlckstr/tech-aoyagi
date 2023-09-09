@extends('adminlte::page')
@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')

<head>
    <!-- bootstrap5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

    <div class="container ">

            <form action="{{ url('/items/edit')}}" method="POST" >
                {{ csrf_field() }}


                <input type="hidden" name="id" value="{{$item_edit->id}}">
                
                <div class="form-group w-50 container">
                    <label for="item_edit_name">ID:{{$item_edit->id}}　商品名</label>
                    <input type="text" id="item_edit_name" name="name" class="form-control col-xs-5"  value="{{ old('name', $item_edit->name) }}">
                    <!-- @error('name')
                    <p>{{ $message }}</p>
                    @enderror -->
                </div>

                <div class="form-group w-50 container">
                    <label for="item_edit_produce">産地</label>
                    <input type="text" id="item_edit_produce" name="produce" class="form-control col-xs-5"  value="{{ old('produce', $item_edit->produce) }}">
                    <!-- @error('name')
                    <p>{{ $message }}</p>
                    @enderror -->
                </div>

                </div>


                    <div class="form-group w-50 container">
                        <label for="item_edit_type" class="control-label">種別</label>
                        <select name="type" id="item_edit_type" class="form-select  ">
                            <option value="{{ old('type', $item_edit ->type)}}" selected hidden class=""> 
                                現在は
                                @switch($item_edit -> type)
                                    @case (1) 果物
                                        @break
                                    @case (2) 野菜
                                        @break
                                    @case (3) きのこ
                                        @break
                                    @case (4) その他
                                        @break
                                    @endswitchです </option>
                            <option value="1">果物</option>
                            <option value="2">野菜</option>
                            <option value="3">きのこ</option>
                            <option value="4">その他</option>
                        </select>
                    </div>

                    <div class="form-group w-50 container">
                        <label for="item_edit_variety">品種</label>
                        <input type="text" id="item_edit_variety" name="variety" class="form-control" value="{{ old('variety', $item_edit->variety) }}">
                        <!-- @error('email')
                        <p>{{ $message }}</p>
                        @enderror -->
                    </div>

                    <div class="form-group w-50 container">
                        <label for="item_edit_price">価格</label>
                        <input type="number" id="item_edit_price" name="price" class="form-control" value="{{ old('price', $item_edit->price) }}">
                        <!-- @error('email')
                        <p>{{ $message }}</p>
                        @enderror -->
                    </div>



                <div class="form-group">
                    <label for="item_edit_datail">詳細</label>
                    <textarea id="item_edit_datail" name="detail" class="form-control" value="{{ old('detail', $item_edit->detail) }}">
                    </textarea>
                    <!-- @error('email')
                    <p>{{ $message }}</p>
                    @enderror -->
                </div>

                <div class="form-group container w-25  mt-3">
                    <button type="submit" class="btn btn-outline-success w-100" >
                        編集
                    </button>
                </div>
            </form>

            <form action="/destroy1/{{$item_edit ->id}}" method="POST" class="container w-25" >
                <button type="submit" class="btn btn-outline-danger w-100">
                    削除
                    {{ csrf_field() }}
                </button>
            </form>
    </div>
</div>
@stop