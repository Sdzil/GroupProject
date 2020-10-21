@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">第一層類型管理 - ProductMainClass</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/productMainClasses/create">新增第一層類別</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>第一層類別名稱(MainClass)</th>
                                    <th>排序(sort)</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productMainClasses as $productMainClass)
                                    <tr>
                                        <td>{{ $productMainClass->mainClassName }}</td>
                                        <td>{{ $productMainClass->sort }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="/admin/productMainClasses/edit/{{ $productMainClass->id }}">編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-pmcid="{{ $productMainClass->id }}">刪除</button>

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
        });

        $("#example").on("click", ".btn-delete", function() {
                var item_id = this.dataset.pmcid;

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
                        
                        window.location.href = `/admin/productMainClasses/destroy/${item_id}`;

                    }
                })



            })



    </script>
@endsection
