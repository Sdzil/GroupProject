@extends('layouts/front_layouts')

@section('css')
    <title>最新消息</title>

    <link rel="stylesheet" href="/css/newsinfo/主頁sass.css">
    <link rel="stylesheet" href="/css/newsinfo/news_info.css">
@endsection


@section('main')


    <div class="box"></div>

    <div id="section1">
        <!--麵包屑-->
        <div id="bread margin-0_auto ">
            <div class="title col-sm-12 col-md-11 col-lg-10 margin-0_auto ">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item "><a href="/">首頁
                        </a></li>
                    <li class="breadcrumb-item "><a href="/news">最新消息
                        </a></li>
                    <li class="breadcrumb-item ">{{$news->title}}</li>
                </ul>
            </div>

            <div class="col-sm-12 col-md-11 col-lg-10 margin-0_auto">
                <div class="now_page">
                    {{$news->title}}</div>
                <div class="time">
                    發佈時間：{{$news->date}}</div>
            </div>
        </div>
    </div>
    <hr class="line margin-0_auto">
    <div id="section2">
        <div class="news_text
            col-sm-12 col-md-11 col-lg-10 margin-0_auto">
            {{$news->content}}
            <br>
            <img width="80%" src="{{$news->infoImageUrl}}" alt="" srcset="">

        </div>
    </div>
    <div class="footer_block"></div>

@endsection

@section('js')

@endsection
