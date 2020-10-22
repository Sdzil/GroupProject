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
        <hr>
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
                <select name="product_type_id" id="product_type_id" required>
                    <option value=""></option>
                    @foreach ($productTypes as $productType)

                        <option value="{{ $productType->id }}" @if ($product->product_type_id == $productType->id) selected @endif>{{ $productType->typeName }}
                        </option>


                    @endforeach
                </select>
            </div>

            <hr>
            <div class="form-group" id="spec">

                <h5 class="my-2">新增產品規格(選填)</h5>

                <div class="row">
                <label for="size_XS" class="col-2 p-1" >XS:
                    <input name="size_XS" value="{{ $product->stock[0]->amount }}" type="number" class="form-control" value="0" id="size_XS" aria-describedby="emailHelp">
                </label>
                <label for="size_S" class="col-2 p-1" >S:
                    <input name="size_S"  value="{{ $product->stock[1]->amount }}" type="number" class="form-control" value="0" id="size_S" aria-describedby="emailHelp">
                </label>
                <label for="size_M" class="col-2 p-1" >M:
                    <input name="size_M" value="{{ $product->stock[2]->amount }}" type="number" class="form-control" value="0" id="size_M" aria-describedby="emailHelp">
                </label>
                <label for="size_L" class="col-2 p-1" >L:
                    <input name="size_L" value="{{ $product->stock[3]->amount }}" type="number" class="form-control" value="0" id="size_L" aria-describedby="emailHelp">
                </label>
                <label for="size_XL" class="col-2 p-1" >XL:
                    <input name="size_XL" value="{{ $product->stock[4]->amount }}" type="number" class="form-control" value="0" id="size_XL" aria-describedby="emailHelp">
                </label>
                </div>
            </div>


            <hr>

            <h3>商品圖片管理</h3>

            <div class="form-group" id="imgs">
                <h4>目前圖片群</h4>
                @foreach ($product->productMainImg as $Img)
                    主視覺圖<br>
                    <div class="d-flex flex-column">
                        <img width="200" src="{{ $Img->imageUrl }}" alt="" srcset="">
                        {{-- <label for="sort">權重</label>
                        <input type="number" name="sort" id="sort" value="{{ $Img->sort }}"> --}}
                    </div>


                    <br>
                    組圖<br>
                    <div class="row d-flex flex-column">
                        @foreach ($Img->productInfoImg as $infoImg)
                            <div class="col-12">
                                <img width="75" src="{{ $infoImg->imageUrl }}" alt="" srcset="">
                            </div>
                            {{-- <div class="col-3"> <label for="sort">權重</label>
                            </div>
                            <div class="col-9">
                                <input class="col-9" type="number" name="sort" id="sort" value="{{ $infoImg->sort }}">
                            </div> --}}
                            {{-- <br> --}}
                        @endforeach

                    </div>
                    {{-- @foreach ($Img->productInfoImg as $infoImg)
                        <div class="d-flex flex-column">
                            <img width="75" src="{{ $infoImg->imageUrl }}" alt="" srcset="">
                            <label for="sort">權重</label>
                            <input type="number" name="sort" id="sort" value="{{ $infoImg->sort }}">
                        </div>
                        <br>


                    @endforeach --}}
                    <br>
                @endforeach

                {{-- <div class="d-flex">
                    <a id="imgs_btn_add" href="#imgs" type="button" class="btn btn-success mx-1">新增一組圖片</a>
                    <a id="imgs_btn_delete" href="#imgs" type="button" class="btn btn-danger mx-1">刪除一組圖片</a>
                    <a id="imgs_btn_confirm" type="button" class="btn btn-primary mx-1">確認修改</a>
                </div> --}}
                {{-- <h5 class="my-2">上傳商品主視覺及商品內頁照片(必填)</h5> --}}
                {{-- <label for="mainImageurl"></label>
                <input name="mainImageurl" type="file" class="form-control-file" id="mainImageurl" required>
                <label for="infoImageurl"></label>
                <input name="infoImageurl[]" multiple type="file" class="form-control-file" id="infoImageurl"> --}}


                <hr>


            <div class="form-group row" id="imgs">

                {{-- <div class="d-flex">
                    <a id="imgs_btn_add" href="#imgs" type="button" class="btn btn-success mx-1">新增一組圖片</a>
                    <a id="imgs_btn_delete" href="#imgs" type="button" class="btn btn-danger mx-1">刪除一組圖片</a>
                </div> --}}
                <div class="col-3">
                    <h5 class="mb-3">修改第一組商品主視覺及商品內頁照片</h5>
                <label for="mainImageurl_0">主視覺圖<small class="text-danger">(必填)</small></label>
                <input name="mainImageurl_0" type="file" class="form-control-file mb-3" id="mainImageurl_0" required>
                <label for="infoImageurl_0">商品內頁組圖(選填，可選多張)</label>
                <input name="infoImageur_0[]" multiple type="file" class="form-control-file" id="infoImageurl_0">
                </div>
                <div class="col-3">
                    <h5 class="mb-3">修改第二組商品主視覺及商品內頁照片</h5>
                <label for="mainImageurl_1">主視覺圖<small class="text-danger">(選填)</small></label>
                <input name="mainImageurl_1" type="file" class="form-control-file mb-3" id="mainImageurl_1" >
                <label for="infoImageurl_1">商品內頁組圖(選填，可選多張)</label>
                <input name="infoImageurl_1[]" multiple type="file" class="form-control-file" id="infoImageurl_1">
                </div>
                <div class="col-3">
                    <h5 class="mb-3">修改第三組商品主視覺及商品內頁照片</h5>
                <label for="mainImageurl_2">主視覺圖<small class="text-danger">(選填)</small></label>
                <input name="mainImageurl_2" type="file" class="form-control-file mb-3" id="mainImageurl_2" >
                <label for="infoImageurl_2">商品內頁組圖(選填，可選多張)</label>
                <input name="infoImageurl_2[]" multiple type="file" class="form-control-file" id="infoImageurl_2">
                </div>


            </div>

            </div>





            <hr>

            {{-- <h3>庫存管理</h3>

            <div class="form-group" id="spec">
                <div class="d-flex">
                    <a id="spec_btn_add" href="#spec" type="button" class="btn btn-success mx-1">新增一組規格</a>
                    <a id="spec_btn_delete" href="#spec" type="button" class="btn btn-danger mx-1">刪除一組規格</a>
                    <a id="imgs_btn_confirm" type="button" class="btn btn-primary mx-1">確認修改</a>
                </div>
                <h5 class="my-2">新增產品規格(選填)</h5>

            </div>
            <hr> --}}

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

    <script>
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
