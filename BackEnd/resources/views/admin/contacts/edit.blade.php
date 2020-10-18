@extends('layouts.app');

@section('css')

@endsection

@section('content')


    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
            <li class="breadcrumb-item"><a href="/admin/contacts">聯絡表單管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">編輯聯絡表單</li>
            </ol>
        </nav>

        <form method="POST" action="/admin/contacts/update/{{ $edit_contact->id }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="subject">主旨</label>
                <input name="subject" type="text" class="form-control" id="subject" aria-describedby="emailHelp" value="{{$edit_contact->subject}}" required>
            </div>

            <div class="form-group">
                <label for="content">問題描述</label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp" value="{{$edit_contact->content}}" required>
            </div>

              <div class="form-group">
                <label for="name">姓名</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" value="{{$edit_contact->name}}" required>
              </div>

              <div class="form-group">
                <label for="phoneNumber">電話</label>
                <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" value="{{$edit_contact->phoneNumber}}" required>
              </div>

              <div class="form-group">
                <label for="address">地址</label>
                <input name="address" type="text" class="form-control" id="address" value="{{$edit_contact->address}}" required>
              </div>

              <div class="form-group">
                <label for="email">電子信箱</label>
                <input name="email" type="email" class="form-control" id="email" value="{{$edit_contact->email}}" required>
              </div>

            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
