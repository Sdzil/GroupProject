@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">最新消息管理 - Index</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/news/create">新增最新消息</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>標題(title)</th>
                                    <th>內文(content)</th>
                                    <th>列表圖片(listImageUrl)</th>
                                    <th>內文圖片(infoImageUrl)</th>
                                    <th>日期(date))</th>
                                    <th>權重(sort))</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsClass as $news)
                                    <tr>
                                        <td>{{ $news->title }}</td>
                                        <td>{{ $news->content }}</td>
                                        <td><img height="100" src="{{$news->listImageUrl}}" alt=""></td>
                                        <td><img height="100" src="{{$news->infoImageUrl}}" alt=""></td>
                                        <td>{{ $news->date }}</td>
                                        <td>{{ $news->sort }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="/admin/news/edit/{{ $news->id }}">編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-itemid="{{ $news->id }}">刪除</button>
                                            {{-- <a class="btn btn-danger btn-sm btn-del"  data-newsid="{{ $news->id }}">刪除</a> --}}
{{--
                                            <form class="destroy-form" data-itemid="{{ $item->id }}"
                                                action="/admin/news/destroy/{{ $item->id }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form> --}}
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
                "order": [1, "desc"] //根據第一欄倒序排列
            });
            $("#example").on("click", ".btn-delete", function() {
                var item_id = this.dataset.itemid;

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
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                        window.location.href = `/admin/news/destroy/${item_id}`;

                    }
                })



            })

        });

    </script>
@endsection
