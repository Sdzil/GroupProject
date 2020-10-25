@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
    <div class="container-fliud px-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">產品管理 - Product</div>

                    <div class="card-body">
                        <div class="row justify-content-between px-3">
                            <a class="btn btn-success" href="/admin/products/create">新增產品</a>

                            <select name="productType" id="productType" class="right form-contorl">
                                <option id="productType_0" value="">全部商品</option>
                                @foreach ($productTypes as $productType)
                                    <option id="productType_{{ $productType->id }}" value="{{ $productType->typeName }}">
                                        {{ $productType->typeName }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <hr>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>產品名稱(productName)</th>
                                    <th>價格(price)</th>
                                    <th>產品資訊(productInfo)</th>
                                    <th>描述(content)</th>
                                    <th>排序(sort)</th>
                                    <th>主視覺圖(mainImage)</th>
                                    <th>類別(productType)</th>
                                    <th>庫存數量(stock)</th>
                                    {{-- 顯示的部分之後調整到功能區 --}}
                                    {{-- <th>顯示(visble)</th> --}}
                                    <th width="120">功能</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($products as $product)

                                    <tr>
                                        <td>{{ $product->productName }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <img class="m-1" height="75" src="{{ $product->productInfo }}" alt="">
                                        </td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->sort }}</td>
                                        <td class="d-flex">
                                            @foreach ($product->productMainImg as $MainImg)
                                                <img class="m-1" height="75" src="{{ $MainImg->imageUrl }}" alt="">
                                            @endforeach
                                        </td>
                                        <td>

                                            {{ $product->productType->typeName }}

                                        </td>

                                        <td>
                                            @for ($i = 0; $i < 6; $i++)
                                                @if ($product->product_type_id < 11)
                                                    @if ($i < 5)
                                                        <p>{{ $product->stock[$i]->size }} : {{ $product->stock[$i]->amount }} 件</p>
                                                    @else
                                                        @continue
                                                    @endif
                                                @else
                                                    @if ($i == 5)
                                                        <p>{{ $product->stock[$i]->amount }} 個</p>
                                                    @else
                                                        @continue
                                                    @endif
                                                @endif
                                            @endfor
                                            {{-- @foreach ($product->stock as $stk)
                                                @if ($product->productType < 11)
                                                    <p>{{ $stk->size }} : {{ $stk->amount }}</p>
                                                @else
                                                    <p>@if {{ $stk->size }} : {{ $stk->amount }}</p>
                                                @endif
                                            @endforeach --}}

                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href='/admin/products/edit/{{ $product->id }}'>編輯</a>
                                            <button class="btn btn-sm btn-danger btn-delete"
                                                data-itemid="{{ $product->id }}">刪除</button>
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
            var table = $('#example').DataTable({
                "order": [
                    [4, "desc"],
                    [1, "desc"]
                ] //根據第三欄及第一欄倒序排列
            });
            //利用第三層產品類別做搜尋
            $('#productType').on('change', function() {
                table.columns(6).search($(this).val()).draw();
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

                    window.location.href = `/admin/products/destroy/${item_id}`;

                }
            })
        })

    </script>
@endsection
