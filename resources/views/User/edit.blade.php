@extends('adminlte::page')
@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')

<head>
    <!-- bootstrap5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<div class="mt-4 col-md-10 card">

    <form action="{{ url('/user/edit')}}" method="POST" class="card-body" >
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$members_edit->id}}">

        <div class="form-group">
            <label for="members_edit_name">ID:{{$members_edit->id}}　担当者名</label>
                <input type="text" id="members_edit_name" name="name" class="form-control col-xs-5"  value="{{ old('name', $members_edit->name) }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
        </div>
        <div class="form-group">
            <label for="members_edit_role" class="control-label">権限</label>
                <select name="role" id="members_edit_role" class="form-select ">
                    <option value="{{ old('role', $members_edit ->role)}}" selected hidden class=""> 
                        現在は
                        @switch($members_edit ->role)
                        @case(10) 閲覧者
                        @break
                        @case(50) 編集者
                        @break
                        @case(100) 管理者
                        @break
                        @endswitchです </option>
                    <option value="10">閲覧者</option>
                    <option value="50">編集者</option>
                    <option value="100">管理者</option>
                </select>
        </div>
        <div class="form-group">
            <label for="members_edit_name">メールアドレス</label>
                <input type="email" id="members_edit_email" name="email" class="form-control" value="{{ old('email', $members_edit->email) }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
        </div>

</div>

        <div class="form-group container w-25  mt-3">
            <button type="submit" class="btn btn-outline-success w-100" >
            編集
            </button>
        </div>
    </form>

    <form action="/destroy/{{$members_edit ->id}}" method="POST" class="container w-25" >
        <button type="submit" class="btn btn-outline-danger w-100">
            削除
            {{ csrf_field() }}
        </button>
    </form>


@stop