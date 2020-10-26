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
                    @foreach ($productTypes as $productType)

                        <option value="{{ $productType->id }}">{{ $productType->typeName }}
                        </option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">

                <label for="productInfo">商品資訊圖<small class="text-danger">(必填)</small></label>
                <input name="productInfo" type="file" class="form-control-file mb-3" id="productInfo" required>

            </div>
            {{-- <div class="form-group">
                <label for="visible">商品是否顯示 <small class="text-danger">預設為顯示</small></label>
                <select name="visible" id="visible">
                    <option value="1" selected>顯示</option>
                    <option value="0">不顯示</option>
                </select> --}}
                {{-- <label for="visible">顯示</label>
                <input name="visible" type="text" class="form-control" id="visible" aria-describedby="emailHelp" required>
                --}}
            {{-- </div> --}}
            <hr>
             <div class="form-group" id="spec">
             {{--   <div class="d-flex">
                    <a id="spec_btn_add" href="#spec" type="button" class="btn btn-success mx-1">新增一組規格</a>
                    <a id="spec_btn_delete" href="#spec" type="button" class="btn btn-danger mx-1">刪除一組規格</a>
                </div> --}}
                <h5 class="my-2">新增產品規格(選填)</h5>
                {{-- <label for="stockType">產品規格</label>
                <input name="stockType" type="text" class="form-control" id="stockType" aria-describedby="emailHelp"
                    required>
                <label for="qty">數量</label>
                <input name="qty" type="text" class="form-control" id="qty" aria-describedby="emailHelp" required>
                --}}
                <div class="row cloth">
                <label for="size_XS" class="col-2 p-1" >XS:
                    <input name="size_XS" type="number" class="form-control" value="0" id="size_XS" aria-describedby="emailHelp">
                </label>
                <label for="size_S" class="col-2 p-1" >S:
                    <input name="size_S" type="number" class="form-control" value="0" id="size_S" aria-describedby="emailHelp">
                </label>
                <label for="size_M" class="col-2 p-1" >M:
                    <input name="size_M" type="number" class="form-control" value="0" id="size_M" aria-describedby="emailHelp">
                </label>
                <label for="size_L" class="col-2 p-1" >L:
                    <input name="size_L" type="number" class="form-control" value="0" id="size_L" aria-describedby="emailHelp">
                </label>
                <label for="size_XL" class="col-2 p-1" >XL:
                    <input name="size_XL" type="number" class="form-control" value="0" id="size_XL" aria-describedby="emailHelp">
                </label>
                </div>

                <div class="row d-none others">
                    <label for="others" class="col-2 p-1" >數量:
                        <input name="others" type="number" class="form-control" value="0" id="others" aria-describedby="emailHelp">
                    </label>
                    </div>

            </div>

            <hr>


            <div class="form-group row" id="imgs">

                {{-- <div class="d-flex">
                    <a id="imgs_btn_add" href="#imgs" type="button" class="btn btn-success mx-1">新增一組圖片</a>
                    <a id="imgs_btn_delete" href="#imgs" type="button" class="btn btn-danger mx-1">刪除一組圖片</a>
                </div> --}}
                <div class="col-3">
                    <h5 class="mb-3">上傳第一組商品主視覺及商品內頁照片</h5>
                <label for="mainImageurl_0">主視覺圖<small class="text-danger">(必填)</small></label>
                <input name="mainImageurl_0" type="file" class="form-control-file mb-3" id="mainImageurl_0" required>
                <label for="infoImageurl_0">商品內頁組圖(選填，可選多張)</label>
                <input name="infoImageur_0[]" multiple type="file" class="form-control-file" id="infoImageurl_0">
                </div>
                <div class="col-3">
                    <h5 class="mb-3">上傳第二組商品主視覺及商品內頁照片</h5>
                <label for="mainImageurl_1">主視覺圖<small class="text-danger">(選填)</small></label>
                <input name="mainImageurl_1" type="file" class="form-control-file mb-3" id="mainImageurl_1" >
                <label for="infoImageurl_1">商品內頁組圖(選填，可選多張)</label>
                <input name="infoImageurl_1[]" multiple type="file" class="form-control-file" id="infoImageurl_1">
                </div>
                <div class="col-3">
                    <h5 class="mb-3">上傳第三組商品主視覺及商品內頁照片</h5>
                <label for="mainImageurl_2">主視覺圖<small class="text-danger">(選填)</small></label>
                <input name="mainImageurl_2" type="file" class="form-control-file mb-3" id="mainImageurl_2" >
                <label for="infoImageurl_2">商品內頁組圖(選填，可選多張)</label>
                <input name="infoImageurl_2[]" multiple type="file" class="form-control-file" id="infoImageurl_2">
                </div>


            </div>

            <hr>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

    <script>

        $('#product_type_id').change(function(){
            var type = $(this).val();
            console.log(type);
            if (type < 11) {
                $(".cloth").removeClass("d-none");
                $(".others").addClass("d-none");
            }else{
                $(".cloth").addClass("d-none");
                $(".others").removeClass("d-none");
            }

        });


        //新增規格
        // $('#spec_btn_add').click(function() {

        //     var id = $('.item_type').length;
        //     $('#spec').append(
        //         `<label class="text-bold" for="stockType_${id}" class="">第 ${id+1} 種產品規格</label>
        //             <input name="stockType_${id}" type="text" class="form-control item_type mb-2" id="stockType_${id}" aria-describedby="emailHelp" required>
        //             <label class="text-bold" for="qty_${id}">數量</label>
        //             <input name="qty_${id}" type="text" class="form-control mb-2" id="qty_${id}" aria-describedby="emailHelp" required><br>`
        //     );

        // });

        //刪除規格
        // $('#spec_btn_delete').click(function() {

        //     $("#spec label:last").remove();
        //     $("#spec input:last").remove();
        //     $("#spec label:last").remove();
        //     $("#spec input:last").remove();

        // });

        //新增規格
        // $('#imgs_btn_add').click(function() {

        //     var id = $('.main_img').length;
        //     $('#imgs').append(
        //         `<label class="text-bold" for="mainImageurl_${id}">第 ${id+1} 組 商品主視覺圖</label>
        //             <input name="mainImageurl_${id}" type="file" class="form-control-file main_img mb-2" id="mainImageurl_${id}" required>
        //             <label class="text-bold" for="infoImageurl_${id}">第 ${id+1} 組 商品內頁組圖</label>
        //             <input name="infoImageurl_${id}[]" multiple type="file" class="form-control-file mb-2" id="infoImageurl_${id}"><br>`
        //     );

        // });

        //刪除規格
        // $('#imgs_btn_delete').click(function() {

        //     $("#imgs label:last").remove();
        //     $("#imgs input:last").remove();
        //     $("#imgs label:last").remove();
        //     $("#imgs input:last").remove();

        // });

    </script>



@endsection
