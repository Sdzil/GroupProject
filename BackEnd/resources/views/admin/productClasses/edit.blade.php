@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/productTypes">第三層產品類別管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">編輯第三層產品類別</li>
            </ol>
        </nav>
        {{-- {{ $edit_productMainClasses }} --}}

        <form method="POST" action="/admin/productTypes/update/{{ $edit_productType->id }}"
            enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="product_class_id">第二層類別名稱</label>
                <select name="product_class_id" id="product_class_id">
                    @foreach ($edit_productClasses as $edit_productClass)
                        @if ($edit_productType->product_class_id == $edit_productClass->id)
                            <option value="{{ $edit_productClass->id }}" selected>
                                {{ $edit_productClass->className }}</option>
                        @else
                            <option value="{{ $edit_productClass->id }}">{{ $edit_productClass->className }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="typeName">第二層類別名稱</label>
                <input name="typeName" type="text" class="form-control" id="className"
                    value="{{ $edit_productType->typeName }}" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="sort">權重</label>
                <input name="sort" type="text" class="form-control" id="sort" value="{{ $edit_productType->sort }}"
                    aria-describedby="emailHelp" required>
            </div>


            <button type="submit" class="btn btn-primary">送出編輯</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
