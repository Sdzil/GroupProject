@extends('layouts.app');

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/news">最新消息管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增最新消息</li>
            </ol>
        </nav>

        <form method="POST" action="/admin/news/store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title">標題*<small class="text-danger"> (必填)</small></label>
                <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="content">內文<small class="text-danger"> (選填)</small></label>
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="listImageUrl">列表圖片<small class="text-danger"> (選填) 建議大小400*200px 預設圖片為形象Logo</small></label>
                <input name="listImageUrl" type="file" class="form-control-file" id="listImageUrl">
            </div>

            <div class="form-group">
                <label for="infoImageUrl">內文圖片<small class="text-danger"> (選填) 建議大小960*640px</small></label>
                <input name="infoImageUrl" type="file" class="form-control-file" id="infoImageUrl">
            </div>


            <div class="form-group">
                <label for="date">發布日期<small class="text-danger"> (必填)</small></label>
                <input name="date" type="date" class="form-control" id="date" required>
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

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-zh-TW.min.js"
        integrity="sha512-QwmFqNXzMuXrWliMHyf5PZTJBdoq1gsCwUyM6ffVk+4/N+R76EFwLWM/6lszVVD8Zza3xd6v16Nl6ApsqTr+sg=="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#content').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                height: 150,
                lang: 'zh-TW',
            });
        });

    </script>
@endsection
