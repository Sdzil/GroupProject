@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">首頁橫幅管理 - Banner</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/banners/create">新增首頁橫幅</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>圖片(imageUrl)</th>
                                    <th>描述(description)</th>
                                    <th>連結(link)</th>
                                    <th>權重(sort))</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td><img height="100" src="{{$banner->imageUrl}}" alt=""></td>
                                        <td>{{ $banner->description }}</td>
                                        <td>{{ $banner->link }}</td>
                                        <td>{{ $banner->sort }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="/admin/banners/edit/{{ $banner->id }}">編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-bannerid="{{ $banner->id }}">刪除</button>
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

                "order": [3, "desc"] //根據第三欄倒序排列

            });

            $("#example").on("click", ".btn-delete", function() {
                var bannerid = this.dataset.bannerid;

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

                        window.location.href = `/admin/banners/destroy/${bannerid}`;

                    }
                })
            })
        });
    </script>
@endsection
