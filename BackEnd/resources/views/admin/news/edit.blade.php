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
                <li class="breadcrumb-item active" aria-current="page">編輯最新消息</li>
            </ol>
        </nav>

        <form method="POST" action="/admin/news/update/{{ $editNews->id }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title">標題</label>
                <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp"
                    value="{{ $editNews->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">內文</label>
                <textarea name="content" class="form-control" id="content" rows="3"
                    required>{{ $editNews->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="listImageUrl">列表圖片</label>
                <img height="100" src='{{ $editNews->listImageUrl }}' alt="">
                <input name="listImageUrl" type="file" class="form-control-file" id="listImageUrl">
            </div>

            <div class="form-group">
                <label for="infoImageUrl">內文圖片</label>
                <img height="100" src='{{ $editNews->infoImageUrl }}' alt="">
                <input name="infoImageUrl" type="file" class="form-control-file" id="infoImageUrl">
            </div>


            <div class="form-group">
                <label for="date">發布日期</label>
                <input name="date" type="number" class="form-control" id="date" value="{{ $editNews->sort }}">

            </div>
            <div class="form-group">
                <label for="sort">權重<small class="text-danger">預設值為"0"</small></label>
                <input name="sort" type="number" class="form-control" id="sort" value="{{ $editNews->sort }}" required>
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
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                height: 150,
                lang: 'zh-TW',
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                },
            });


            $.upload = function(file) {
                let out = new FormData();
                out.append('file', file, file.name);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_upload_img',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function(img) {
                        $('#description').summernote('insertImage', img);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };

            $.delete = function(file_link) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_img',
                    data: {
                        file_link: file_link
                    },
                    success: function(img) {
                        console.log("delete:", img);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
        });

    </script>

@endsection
