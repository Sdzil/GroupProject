@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
            <li class="breadcrumb-item"><a href="/admin/news">產品管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">編輯產品</li>
            </ol>
        </nav>
    <form method="POST" action="/admin/news/update/{{$edit_news->id}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title">標題</label>
                <input name="title" type="text" class="form-control" id="title" value="{{$edit_news->title}}" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="sub_title">副標題</label>
                <input name="sub_title" type="text" class="form-control" id="sub_title" value="{{$edit_news->sub_title}}" aria-describedby="emailHelp" required>
            </div>

                <div class="form-group">
                目前圖片<br>
                <img width="200" src="{{$edit_news->image_url}}" alt="">
                <br>
                <label for="image_url">上傳照片</label>
                <input name="image_url" type="file" class="form-control-file" id="image_url" value="{{$edit_news->image_url}}">
              </div>
              {{-- <div class="form-group">
                <label for="image_url">上傳照片</label>
                <input name="image_url" type="file" class="form-control-file" id="image_url" value="{{$edit_news->image_url}}" required>
              </div> --}}

              <div class="form-group">
                <label for="content">內容</label>
                <textarea name="content" class="form-control" id="content" rows="3" required>{{$edit_news->content}}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">送出編輯</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
