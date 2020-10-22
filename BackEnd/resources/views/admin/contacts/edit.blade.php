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

        {{-- <hr> --}}
        <div class="row mt-5">
            <div class="col">
                <h4>表單詳細資訊</h4>
            </div>
        </div>
        <hr>
        <div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">姓名</label>
                    <input value="{{ $edit_contact->name }}" type="text" class="form-control" id="inputEmail4"
                    Readonly placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">電話</label>
                    <input value="{{ $edit_contact->phoneNumber }}" type="text" class="form-control" id="inputPassword4"
                    Readonly placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">地址</label>
                <input value="{{ $edit_contact->address }}" type="text" class="form-control" id="inputAddress"
                Readonly placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress2">電子信箱</label>
                <input value="{{ $edit_contact->email }}" type="email" class="form-control" id="inputAddress2"
                Readonly placeholder="Apartment, studio, or floor" >
            </div>
            <div class="form-group">
                <label for="inputAddress2">主旨</label>
                <input value="{{ $edit_contact->title }}" type="text" class="form-control" id="inputAddress2"
                Readonly placeholder="Apartment, studio, or floor" >
            </div>
            <div class="form-group">
                <label for="inputAddress2">問題描述</label>
                <textarea type="text" class="form-control" id="inputAddress2" rows="3"
                Readonly placeholder="Apartment, studio, or floor" >{{ $edit_contact->content }}"</textarea>
            </div>


        </div>
        <br>
        {{-- 使用php設定變數 --}}
        <?php
            $ary=["未處理", "已讀", "已讀不回", "已讀不想回", "不想處理", "已處理"];
        ?>

        <hr>
        <form method="POST" action="/admin/contacts/update/{{ $edit_contact->id }}">

            @csrf

            <div class="form-row">
                <div class="form-group col-3">
                    <label for="status">狀態</label>
                    <select name="status" id="status" class="form-control">
                        @foreach ($ary as $item)
                            {{-- 再將上面設定的php變數來這邊做比對 --}}
                            <option value="{{$item}}"  @if ($item == $edit_contact->status) selected @endif>{{$item}}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="reply">問題回覆</label>
                <textarea name="reply" type="text" class="form-control" id="reply" rows="4"
                    placeholder="請針對問題回覆">{{ $edit_contact->reply }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
