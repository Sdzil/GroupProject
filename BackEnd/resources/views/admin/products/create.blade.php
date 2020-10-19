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
                <label for="productName">產品名稱</label>
                <input name="productName" type="text" class="form-control" id="productName" aria-describedby="emailHelp"
                    required>
            </div>

            <div class="form-group">
                <label for="price">價錢</label>
                <input name="price" type="number" class="form-control" id="price" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="content">描述</label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="sort">權重</label>
                <input name="sort" type="text" class="form-control" id="sort" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="className">第三層類別名稱</label>
                <select name="product_type_id" id="product_type_id">
                    @foreach ($productTypes as $productType)

                        <option value="{{ $productType->id }}">{{ $productType->typeName }}
                        </option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stockType">產品尺寸</label>
                <input name="stockType" type="text" class="form-control" id="stockType" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="visible">顯示</label>
                <input name="visible" type="text" class="form-control" id="visible" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="image_url">上傳照片</label>
                <input name="image_url" type="file" class="form-control-file" id="image_url" required>
            </div>


            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
