@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">第二層類別管理 - ProductClass</div>

                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/productClasses/create">新增第二層類別</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>第一層類別名稱(MianClass)</th>
                                    <th>第二層類別名稱(Class)</th>
                                    <th>排序(sort)</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productClasses as $productClass)
                                    <tr>
                                        <td>{{ $productClass->productMainClass->mainClassName }}</td>
                                        <td>{{ $productClass->className }}</td>
                                        <td>{{ $productClass->sort }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="/admin/productClasses/edit/{{ $productClass->id }}">編輯</a>
                                            {{-- <a class="btn btn-danger btn-sm btn-delete" href="#"
                                                data-itemid="{{ $productMainClass->id }}">刪除</a> --}}
                                            <button class="btn btn-sm btn-danger btn-delete" data-itemid="{{ $productClass->id }}">刪除</button>

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
                "order": [2, "desc"] //根據第一欄倒序排列
            });
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
                        window.location.href = `/admin/productClasses/destroy/${item_id}`;

                    }
                })



            })



    </script>
@endsection
