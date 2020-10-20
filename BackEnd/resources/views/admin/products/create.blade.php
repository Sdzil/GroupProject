@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/products">產品管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增產品</li>
            </ol>
        </nav>

        <form method="POST" action="store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="productName">產品名稱(必填)</label>
                <input name="productName" type="text" class="form-control" id="productName" aria-describedby="emailHelp"
                    required>
            </div>

            <div class="form-group">
                <label for="price">價錢(必填)</label>
                <input name="price" type="number" class="form-control" id="price" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="content">描述(選填)</label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="sort">權重 <small class="text-danger">預設為'0'</small></label>
                <input name="sort" type="text" class="form-control" value="0" id="sort" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="className">第三層類別名稱(必填)</label>
                <select name="product_type_id" id="product_type_id" required>
                    <option value=""></option>
                    @foreach ($productTypes as $productType)

                        <option value="{{ $productType->id }}">{{ $productType->typeName }}
                        </option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="visible">商品是否顯示 <small class="text-danger">預設為顯示</small></label>
                <select name="visible" id="visible">
                    <option value="1" selected>顯示</option>
                    <option value="0">不顯示</option>
                </select>
                {{-- <label for="visible">顯示</label>
                <input name="visible" type="text" class="form-control" id="visible" aria-describedby="emailHelp" required>
                --}}
            </div>
            <hr>
            <div class="form-group" id="spec">
                <div class="d-flex">
                    <a id="spec_btn_add" href="#spec" type="button" class="btn btn-success mx-1">新增一組規格</a>
                    <a id="spec_btn_delete" href="#spec" type="button" class="btn btn-danger mx-1">刪除一組規格</a>
                </div>
                <h5 class="my-2">新增產品規格(選填)</h5>
                {{-- <label for="stockType">產品規格</label>
                <input name="stockType" type="text" class="form-control" id="stockType" aria-describedby="emailHelp"
                    required>
                <label for="qty">數量</label>
                <input name="qty" type="text" class="form-control" id="qty" aria-describedby="emailHelp" required>
                --}}

                <select>
                    <option value="5L">5L</option>
                    <option value="4L">4L</option>
                    <option value="3L">3L</option>
                    <option value="2L">2L</option>
                    <option value="XL">XL</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="S">S</option>
                    <option value="XS">XS</option>
                </select>
            </div>

            <hr>


            <div class="form-group" id="imgs">

                <div class="d-flex">
                    <a id="imgs_btn_add" href="#imgs" type="button" class="btn btn-success mx-1">新增一組圖片</a>
                    <a id="imgs_btn_delete" href="#imgs" type="button" class="btn btn-danger mx-1">刪除一組圖片</a>
                </div>
                <h5 class="my-2">上傳商品主視覺及商品內頁照片(必填)</h5>
                {{-- <label for="mainImageurl"></label>
                <input name="mainImageurl" type="file" class="form-control-file" id="mainImageurl" required>
                <label for="infoImageurl"></label>
                <input name="infoImageurl[]" multiple type="file" class="form-control-file" id="infoImageurl"> --}}

            </div>

            <hr>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

    <script>
        //新增規格
        $('#spec_btn_add').click(function() {

            var id = $('.item_type').length;
            $('#spec').append(
                `<label class="text-bold" for="stockType_${id}" class="">第 ${id+1} 種產品規格</label>
                    <input name="stockType_${id}" type="text" class="form-control item_type mb-2" id="stockType_${id}" aria-describedby="emailHelp" required>
                    <label class="text-bold" for="qty_${id}">數量</label>
                    <input name="qty_${id}" type="text" class="form-control mb-2" id="qty_${id}" aria-describedby="emailHelp" required><br>`
            );

        });

        //刪除規格
        $('#spec_btn_delete').click(function() {

            $("#spec label:last").remove();
            $("#spec input:last").remove();
            $("#spec label:last").remove();
            $("#spec input:last").remove();

        });

        //新增規格
        $('#imgs_btn_add').click(function() {

            var id = $('.main_img').length;
            $('#imgs').append(
                `<label class="text-bold" for="mainImageurl_${id}">第 ${id+1} 組 商品主視覺圖</label>
                    <input name="mainImageurl_${id}" type="file" class="form-control-file main_img mb-2" id="mainImageurl_${id}" required>
                    <label class="text-bold" for="infoImageurl_${id}">第 ${id+1} 組 商品內頁組圖</label>
                    <input name="infoImageurl_${id}[]" multiple type="file" class="form-control-file mb-2" id="infoImageurl_${id}"><br>`
            );

        });

        //刪除規格
        $('#imgs_btn_delete').click(function() {

            $("#imgs label:last").remove();
            $("#imgs input:last").remove();
            $("#imgs label:last").remove();
            $("#imgs input:last").remove();

        });

    </script>



@endsection
