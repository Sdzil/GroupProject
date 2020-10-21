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

        <hr>
        <form method="POST" action="/admin/contacts/update/{{ $edit_contact->id }}">

            @csrf

            <div class="form-row">
                <div class="form-group col-3">
                    <label for="status">狀態</label>
                    <select name="status" id="status" class="form-control">
                        <option value="未處理">未處理</option>
                        <option value="已讀">已讀</option>
                        <option value="已讀不回">已讀不回</option>
                        <option value="已讀不想回">已讀不想回</option>
                        <option value="不想讀">不想讀</option>
                        <option value="已處理">已處理</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="reply">問題回覆</label>
                <textarea name="reply" type="text" class="form-control" id="reply" rows="4"
                    placeholder="請針對問題回覆"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection

@section('js')

@endsection
