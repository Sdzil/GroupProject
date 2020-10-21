@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">庫存管理 - Stock</div>
                    <div class="card-header">目前有尺寸及顏色的第二層類別(Class)：
                        @foreach ($productClasses as $Class)
                            @if ($Class->spec == 1)
                                {{$Class->className}}<span>  </span>
                            @endif
                        @endforeach


                    </div>
                    <div class="card-body">
                        <a class="btn btn-success" href="/admin/stocks/create">新增庫存</a>
                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>商品名稱(ProductName)</th>
                                    <th>尺寸(Size)</th>
                                    <th>顏色(Color)</th>
                                    <th>數量(Amount)</th>
                                    <th width="120">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->product->productName }}</td>
                                        <td>{{ $stock->size }}</td>
                                        <td>{{ $stock->color }}</td>
                                        <td>{{ $stock->amount }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="/admin/stocks/edit/{{ $stock->id }}">編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-itemid="{{ $stock->id }}">刪除</button>

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
                "order": [3, "desc"] //根據第一欄倒序排列
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
                        window.location.href = `/admin/stocks/destroy/${item_id}`;

                    }
                })



            })



    </script>
@endsection
