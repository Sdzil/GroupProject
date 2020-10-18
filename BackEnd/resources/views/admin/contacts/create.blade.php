@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
            <li class="breadcrumb-item"><a href="/admin/contacts">聯絡表單管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增聯絡表單</li>
            </ol>
        </nav>

        <form method="POST" action="store" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="subject">主旨</label>
                <input name="subject" type="text" class="form-control" id="subject" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="content">問題描述</label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp" required>
            </div>

              <div class="form-group">
                <label for="name">姓名</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" required>
              </div>

              <div class="form-group">
                <label for="phoneNumber">電話</label>
                <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" required>
              </div>

              <div class="form-group">
                <label for="address">地址</label>
                <input name="address" type="text" class="form-control" id="address" required>
              </div>

              <div class="form-group">
                <label for="email">電子信箱</label>
                <input name="email" type="email" class="form-control" id="email" required>
              </div>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
