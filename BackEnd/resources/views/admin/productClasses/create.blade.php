@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/productClasses">第二層產品類別管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增第二層產品類別</li>
            </ol>
        </nav>

        <form method="POST" action="store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="className">第一層類別名稱</label>
                <select name="product_main_class_id" id="product_main_class_id">
                    @foreach ($edit_productMainClasses as $edit_productMainClass)

                        <option value="{{ $edit_productMainClass->id }}">{{ $edit_productMainClass->mainClassName }}
                        </option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="className">第二層產品類別名稱</label>
                <input name="className" type="text" class="form-control" id="className" aria-describedby="emailHelp"
                    required>
            </div>

            <div class="form-group">
                <label for="sort">權重</label>
                <input name="sort" type="number" class="form-control" id="sort" aria-describedby="emailHelp" required>
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
