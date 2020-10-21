@extends('layouts.app');

@section('css')
    <style>
    .hidden{
        display: none;
    }
    </style>
@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/stocks">庫存管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增庫存</li>
            </ol>
        </nav>

        <form method="POST" action="store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="className">請選擇產品</label>
                <small class="text-danger">所選產品需要時才會出現規格與顏色選項</small>
                <br>
                <select name="product_id" id="product_id">
                    @foreach ($create_products as $create_product)

                        <option data-spec="{{ $create_product->productType->productClass->spec }}" value="{{ $create_product->id }}">{{ $create_product->productName }}
                        </option>

                    @endforeach
                </select>
            </div>

            <div id="size_p"class="form-group hidden">
                <label for="className">請選擇規格</label>
                <select name="size" id="size" >
                        <option value=""></option>
                        <option value="5XL">5XL</option>
                        <option value="4XL">4XL</option>
                        <option value="3XL">3XL</option>
                        <option value="2XL">2XL</option>
                        <option value="XL">XL</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="S">S</option>
                        <option value="XS">XS</option>
                </select>
            </div>
            <br>

            <div id="color_p" class="form-group hidden">
                <label for="color">請輸入顏色</label>
                <input name="color" type="text" class="form-control" id="color" aria-describedby="emailHelp">
            </div>


            <div class="form-group">
                <label for="amount">請輸入數量</label>
                <input name="amount" type="text" class="form-control" id="amount" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')
<script>
    $('#product_id').on('change', function(){
        // $('#product_id' option[selected]).dataset.spec;
        var spec = $("#product_id option:selected").attr("data-spec");
        if(spec == 0){
            $("#size").val("");
            $("#color").val("");
            $("#size_p").addClass("hidden");
            $("#color_p").addClass("hidden");

        }else{
            $("#size_p").removeClass("hidden");
            $("#color_p").removeClass("hidden");

        }

    })



</script>


@endsection
