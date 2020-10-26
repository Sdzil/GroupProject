@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/products">產品管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">編輯產品</li>
            </ol>
        </nav>

        <form method="POST" action="/admin/products/update/{{ $product->id }}" enctype="multipart/form-data">

            @csrf
            <h3>商品資訊管理</h3>
            <div class="form-group">
                <label for="productName">產品名稱(必填)</label>
                <input value="{{ $product->productName }}" name="productName" type="text" class="form-control"
                    id="productName" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="price">價錢(必填)</label>
                <input value="{{ $product->price }}" name="price" type="number" class="form-control" id="price"
                    aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="content">描述(選填)</label>
                <input value="{{ $product->content }}" name="content" type="text" class="form-control" id="content"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="sort">權重 <small class="text-danger">預設為'0'</small></label>
                <input value="{{ $product->sort }}" name="sort" type="text" class="form-control" value="0" id="sort"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="className">第三層類別名稱(必填)</label>
                <select data-type="{{$product->product_type_id}}" name="product_type_id" id="product_type_id" required>
                    @foreach ($productTypes as $productType)

                        <option value="{{ $productType->id }}" @if ($product->product_type_id == $productType->id) selected
                    @endif>{{ $productType->typeName }}
                    </option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">

                <label for="productInfo">商品資訊圖<small class="text-danger">(如要修改請直接上傳圖片)</small></label><br>
                <img width="200" src="{{ $product->productInfo }}" alt="" srcset="">
                <input name="productInfo" type="file" class="form-control-file mb-3" id="productInfo">

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
                {{--
            </div> --}}
            <hr>
            <div class="form-group" id="spec">
                {{-- <div class="d-flex">
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
                {{-- @if ($product->product_type_id < 11){
                    --}}
                    <div class="row cloth">
                        <label for="size_XS" class="col-2 p-1">XS:
                            <input name="size_XS" type="number" class="form-control"
                                value="{{ $product->stock[0]->amount }}" id="size_XS" aria-describedby="emailHelp">
                        </label>
                        <label for="size_S" class="col-2 p-1">S:
                            <input name="size_S" type="number" class="form-control" value="{{ $product->stock[1]->amount }}"
                                id="size_S" aria-describedby="emailHelp">
                        </label>
                        <label for="size_M" class="col-2 p-1">M:
                            <input name="size_M" type="number" class="form-control" value="{{ $product->stock[2]->amount }}"
                                id="size_M" aria-describedby="emailHelp">
                        </label>
                        <label for="size_L" class="col-2 p-1">L:
                            <input name="size_L" type="number" class="form-control" value="{{ $product->stock[3]->amount }}"
                                id="size_L" aria-describedby="emailHelp">
                        </label>
                        <label for="size_XL" class="col-2 p-1">XL:
                            <input name="size_XL" type="number" class="form-control"
                                value="{{ $product->stock[4]->amount }}" id="size_XL" aria-describedby="emailHelp">
                        </label>
                    </div>

                    {{-- @else --}}
                    <div class="row others">
                        <label for="others" class="col-2 p-1">數量:
                            <input name="others" type="number" class="form-control" value="{{ $product->stock[5]->amount }}"
                                id="others" aria-describedby="emailHelp">
                        </label>
                    </div>
                    {{--
                @endif --}}
            </div>

            <hr>


            <div class="form-group row" id="imgs">

                {{-- <div class="d-flex">
                    <a id="imgs_btn_add" href="#imgs" type="button" class="btn btn-success mx-1">新增一組圖片</a>
                    <a id="imgs_btn_delete" href="#imgs" type="button" class="btn btn-danger mx-1">刪除一組圖片</a>
                </div> --}}
                <div class="col-4">
                    <h5 class="mb-3">上傳第一組商品主視覺及商品內頁照片</h5>
                    <img width="200" src="{{ $product->productMainImg[0]->imageUrl }}" alt="" srcset="">
                    <label for="mainImageurl_0">主視覺圖<small class="text-danger">(如要修改請直接上傳圖片)</small></label>
                    <input name="mainImageurl_0" type="file" class="form-control-file mb-3" id="mainImageurl_0">
                    <div class="row">
                    @if (sizeof($product->productMainImg) >= 1)
                        @if ($product->productMainImg[0]->productInfoImg)


                        @foreach ($product->productMainImg[0]->productInfoImg as $infoImg)
                            <div class="col-4">
                                <img width="75" src="{{ $infoImg->imageUrl }}" alt="" srcset="">
                            </div>
                        @endforeach
                    @endif
                    @endif

                        </div>
                    <label for="infoImageurl_0">商品內頁組圖(如要修改請直接上傳圖片，可選多張)</label>
                    <input name="infoImageurl_0[]" multiple type="file" class="form-control-file" id="infoImageurl_0">
                </div>



                <div class="col-4">


                    <h5 class="mb-3">上傳第二組商品主視覺及商品內頁照片</h5>
                    @if (sizeof($product->productMainImg) >= 2)
                        <img width="200" src="{{ $product->productMainImg[1]->imageUrl }}" alt="" srcset="">
                    @endif
                    <label for="mainImageurl_1">主視覺圖<small class="text-danger">(如要修改請直接上傳圖片)</small></label>
                    <input name="mainImageurl_1" type="file" class="form-control-file mb-3" id="mainImageurl_1">
                    <div class="row">
                    @if (sizeof($product->productMainImg) >= 2)
                        @if ($product->productMainImg[1]->productInfoImg)


                        @foreach ($product->productMainImg[1]->productInfoImg as $infoImg)
                            <div class="col-4">
                                <img width="75" src="{{ $infoImg->imageUrl }}" alt="" srcset="">
                            </div>
                        @endforeach
                    @endif
                    @endif

                    </div>
                    <label for="infoImageurl_1">商品內頁組圖(如要修改請直接上傳圖片，可選多張)</label>
                    <input name="infoImageurl_1[]" multiple type="file" class="form-control-file" id="infoImageurl_1">
                </div>
                <div class="col-4">




                    <h5 class="mb-3">上傳第三組商品主視覺及商品內頁照片</h5>
                    @if (sizeof($product->productMainImg) >= 3)
                        <img width="200" src="{{ $product->productMainImg[2]->imageUrl }}" alt="" srcset="">
                    @endif
                    <label for="mainImageurl_2">主視覺圖<small class="text-danger">(如要修改請直接上傳圖片)</small></label>
                    <input name="mainImageurl_2" type="file" class="form-control-file mb-3" id="mainImageurl_2">
                    <div class="row">
                        @if (sizeof($product->productMainImg) >= 3)
                        @if ($product->productMainImg[2]->productInfoImg)


                        @foreach ($product->productMainImg[2]->productInfoImg as $infoImg)
                            <div class="col-4">
                                <img width="75" src="{{ $infoImg->imageUrl }}" alt="" srcset="">
                            </div>
                        @endforeach
                    @endif
                    @endif
                    </div>
                    <label for="infoImageurl_2">商品內頁組圖(如要修改請直接上傳圖片，可選多張)</label>
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
        $(document).ready(function() {
            var type = $('#product_type_id').data('type');
            console.log(type);
            if (type < 11) {
                $(".cloth").removeClass("d-none");
                $(".others").addClass("d-none");
            } else {
                $(".cloth").addClass("d-none");
                $(".others").removeClass("d-none");
            }


        });

        $('#product_type_id').change(function() {
            var type = $(this).val();
            console.log(type);
            if (type < 11) {
                $(".cloth").removeClass("d-none");
                $(".others").addClass("d-none");
            } else {
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
