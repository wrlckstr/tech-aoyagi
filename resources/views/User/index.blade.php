@extends('adminlte::page')
@section('title', 'ユーザー情報一覧')

@section('content_header')
    <h1>ユーザー情報一覧</h1>
@stop

@section('content')
<head>
    <!-- bootstrap5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


<!--ユーザー一覧 -->
<body>
    <form class="form-inline" action="{{ route('user.index') }}" method="GET">
        <div class="form-group">
            <label for="search">名前で検索！</label>
            <input type="search" id="search" class="form-control  mr-3" name="search" value="{{ $search }}" placeholder="ここに入力" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
    </form>

@if (count($info) > 0)
<div class="container-fluid mt-2">
    <div class="row">
            <table class="table table-hover member-table">

                <thead class="table-info">
                    <th>ID</th>
                    <th>担当者名</th>
                    <th>権限</th>
                    <th>メールアドレス</th>
                    <th>更新日時</th>
                    <th>編集</th>
                </thead>
            

            <!-- テーブル本体 -->
                <tbody>
                    <tr>
                        @foreach($info as $information)
                        <td class="table-text">
                            <div>{{$information ->id}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{$information ->name}}</div>
                        </td>
                        <td class="table-text">
                        <div>
                                @switch($information ->role)
                                    @case(10) 閲覧者
                                        @break
                                    @case(50) 編集者
                                        @break
                                    @case(100) 管理者
                                        @break
                                @endswitch
                            </div>
                        </td>
                        <td class="table-text">
                            <div>{{$information ->email}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{$information ->updated_at}}</div>
                        </td>
                        <td class="table-text">
                            <!-- 編集ボタン -->
                            <div>
                            <a href="/user/edit/{{$information -> id}}" class="text-decoration-none text-black">
                                <button type="submit" class="btn btn-outline-dark">
                                    編集
                                </button>
                            </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    <!-- ページネーション -->

        {{$info -> links() }}

</div>
@endif
</body>
@stop
