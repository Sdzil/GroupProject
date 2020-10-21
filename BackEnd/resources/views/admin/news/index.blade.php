@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">最新消息管理 - News</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/news/create">新增最新消息</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="200">標題(title)</th>
                                    <th>內文(content)</th>
                                    <th>列表圖片(listImageUrl)</th>
                                    <th>內文圖片(infoImageUrl)</th>
                                    <th width="100">日期(date))</th>
                                    <th>權重(sort))</th>
                                    <th width="100">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsList as $news)
                                    <tr>
                                        <td>{{ $news->title }}</td>
                                        <td>{{ $news->content }}</td>
                                        <td>
                                            @if ($news->listImageUrl == null)
                                                <img height="100" src='/upload/news/16032882732723d092b63885e0d7c260cc007e8b9d.jpg' alt="">
                                            @else
                                                <img height="100" src='{{ $news->listImageUrl }}' alt="">
                                            @endif
                                        </td>
                                        <td><img height="100" src="{{ $news->infoImageUrl }}" alt=""></td>
                                        <td>{{ $news->date }}</td>
                                        <td>{{ $news->sort }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="/admin/news/edit/{{ $news->id }}">編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete"
                                                data-newsid="{{ $news->id }}">刪除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [5, "desc"],
                    [4, "desc"]
                ] //根據sort倒序排列 次要排序為日期
            });
            $("#example").on("click", ".btn-delete", function() {
                var news_id = this.dataset.newsid;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href = `/admin/news/destroy/${news_id}`;

                    }
                })
            })
        });

    </script>
@endsection
