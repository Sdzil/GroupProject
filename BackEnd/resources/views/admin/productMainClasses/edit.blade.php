@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item"><a href="/admin/productMainClass">第一層產品類別管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">編輯第一層產品類別</li>
            </ol>
        </nav>
        <form method="POST" action="/admin/productMainClasses/update/{{ $edit_productMainClass->id }}"
            enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="mainClassName">第一層產品類別名稱</label>
                <input name="mainClassName" type="text" class="form-control" id="mainClassName"
                    value="{{ $edit_productMainClass->mainClassName }}" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="sort">權重</label>
                <input name="sort" type="text" class="form-control" id="sort" value="{{ $edit_productMainClass->sort }}"
                    aria-describedby="emailHelp" required>
            </div>


            <button type="submit" class="btn btn-primary">送出編輯</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
