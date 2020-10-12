@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
            <li class="breadcrumb-item"><a href="/admin/items">產品管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增產品</li>
            </ol>
        </nav>

        <form method="POST" action="store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="itemName">產品名稱</label>
                <input name="itemName" type="text" class="form-control" id="itemName" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="price">價錢</label>
                <input name="price" type="number" class="form-control" id="price" aria-describedby="emailHelp" required>
            </div>

              <div class="form-group">
                <label for="image_url">上傳照片</label>
                <input name="image_url" type="file" class="form-control-file" id="image_url" required>
              </div>

              <div class="form-group">
                <label for="content">內容</label>
                <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
              </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
