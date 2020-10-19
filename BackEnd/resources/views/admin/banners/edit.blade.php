@extends('layouts.app');

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/banners">布告欄管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">編輯布告欄圖片</li>
            </ol>
        </nav>

    <form method="POST" action="/admin/banners/update/{{$editBanner->id}}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="imageUrl">列表圖片</label>
                <img src="{{$editBanner->imageUrl}}" alt="">
                <input name="imageUrl" type="file" class="form-control-file" id="imageUrl">
            </div>

            <div class="form-group">
                <label for="description">描述<small class="text-danger">業主了解內容</small></label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{$editBanner->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="link">點擊連結</label>
                <input name="link" type="text" class="form-control" value="{{$editBanner->link}}" id="link">
            </div>
            <div class="form-group">
                <label for="sort">權重<small class="text-danger">預設值為"0"</small></label>
                <input name="sort" type="number" class="form-control" id="sort" value="0" required>
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')


@endsection
