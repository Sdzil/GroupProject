@extends('layouts/front_layouts')


@section('css')
    <title>最新消息</title>
    <link rel="stylesheet" href="/css/news/news.css">
    <link rel="stylesheet" href="/css/news/主頁sass.css">
@endsection



@section('main')

<div id="section1">
    <!--麵包屑-->
    <div id="bread margin-0_auto">
        <div class="title-contain col-10 margin-0_auto ">
            <ul class="breadcrumb">
                <li class="breadcrumb-item "><a href="">首頁
                    </a></li>
                <li class="breadcrumb-item ">最新消息</li>
            </ul>
        </div>

        <div class="col-10 margin-0_auto">
            <div class="now_page">最新消息</div>
        </div>
    </div>


</div>

<div id="section2">

    <div class="time_select col-md-10 col-lg-10 margin-0_auto">
        <div class="time_select-container d-flex justify-content-between">
            <input class="date col-md-3 col-lg-3 " type="date" value="選擇日期">
            <div class="select">
                <a href="">
                    <div class="botton col-md-2 col-lg-2 d-flex">
                        <div class="text margin-0_auto ">篩選</div>
                    </div>

                </a>

                <img src="" alt="">
                <!--篩選icon-->
            </div>
        </div>
    </div>
    <!--消息卡片-->

    <div class="dashboard dflex margin-0_auto flex-wrap">
        @foreach ($newsList as $news)
        <div class="card col-md-11 col-lg-10 margin-0_auto ">

                <div class="card_container d-flex flex-wrap col-12 margin-0_auto">
                    <div class="news_photo col-10 col-lg-3 my-auto">
                        <a href="" class=" d-flex "><img class="photo" src=@if($news->listImageUrl==null) '/upload/news/16032882732723d092b63885e0d7c260cc007e8b9d.jpg' @else {{$news->listImageUrl}} @endif alt="">
                            <!--news_info網址-->



                        </a>
                    </div>
                    <div class="news_info col-lg-8 d-flex margin-0_auto">
                        <div class="contain dflex flex-wrap col-11 my-auto">
                            <div class="title">
                                <a href="/news/Info/{{$news->id}}">
                                    <!--news_info網址-->
                                    <p class="title_text">{{$news->title}}</p>
                                </a>
                            </div>
                            <div class="date">
                                {{$news->date}}
                            </div>
                            <div class="info ">
                            <p class="JQ ellipsis">{!!$news->content!!}</p>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        @endforeach
    </div>
</div>


@endsection



@section('js')
    <script src="/js/news/news.js"></script>
@endsection
