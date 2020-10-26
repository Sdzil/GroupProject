@extends('layouts/front_layouts')


@section('css')



    <link rel="stylesheet" href="/css/productInfo/product_info.css">


    <!-- swiper -->
    <link rel="stylesheet" href="/css/productInfo/swiper.css">
    <!-- viewer -->
    <!-- <link rel="stylesheet" href="./css/viewer.css"> -->
    <!-- spinner -->
    <link rel="stylesheet" href="/css/productInfo/jquery-spinner-ui.css">

@endsection



@section('main')


    <div>

        <div id="breadcrumb">
            <div id="" class="title-contain col-xl-10 m-auto ">

                <ul class="breadcrumb ">
                    <li class="breadcrumb-item "><a href="/">首頁
                        </a></li>
                    <li class="breadcrumb-item "><a href="/product/cloth">潮流服飾
                        </a></li>
                    <li class="breadcrumb-item">衣服</li>
                </ul>
            </div>
        </div>

    </div>


    <div>

        <div class="container-fluid">
            <right-side class="row">
                <div class=" top-high order-0 offset-lg-1  col-md-12 col-sm-12   col-lg-4">
                    <!-- top-slide-01 -->
                    <?php $i = 1?>
                    @foreach ($product->productMainImg as $mainImg)

                        <div class="top_{{$i}} swiper-container d-none row gallery-top">
                            <div class="swiper-wrapper">
                                @foreach ($mainImg->productInfoImg as $infoImg)
                                    <div class="swiper-slide" style="background-image:url({{ $infoImg->imageUrl }})">
                                    </div>
                                @endforeach


                            </div>
                            <!-- Add Arrows -->
                            <div class="btn_next swiper-button-next swiper-button-white"></div>
                            <div class="btn_pre swiper-button-prev swiper-button-white"></div>
                        </div>
                        <?php $i++ ?>
                    @endforeach

                </div>


                <div
                    class=" leftside order-6 order-md-6 order-lg-1  col-md-12 col-sm-12 col-xs-12 col-lg-5 col-12   d-flex align-content-around flex-wrap  offset-lg-1 col-4">
                    <div class="sub_title col-12">
                        Notorious 20 S/S TaxZinc™
                    </div>
                    <div class="title col-12">{{ $product->productName }}</div>
                    <div class="price col-12">$ {{ $product->price }}</div>
                    <div class="text">
                        {{ $product->content }}
                    </div>

                    <div class="btn-coumston-group col-12 d-flex">
                        @foreach ($product->productMainImg as $mainImg)
                            {{-- {{ $mainImg }} --}}
                            <div class="btn-coumston mr-2" data-imgbtnid="{{ $mainImg->id }}"
                                style="background-image:url({{ $mainImg->imageUrl }})">
                            </div>
                        @endforeach
                        {{-- <div class="btn-coumston mr-2" data-imgbtnid="1"
                            style="background-image:url(https://img.notorious-2019.com/f5ca1c67621cd7f6214fb162.jpg)">
                        </div>
                        <div class="btn-coumston mr-2" data-imgbtnid="2"
                            style="background-image:url(https://img.notorious-2019.com/854dd3a055613f255649c355.jpg)">
                        </div> --}}
                    </div>

                    <div class="portfolio col-12">
                        <a href="#portfolio-rule" class="button px-1" role="button">尺碼表</a>
                    </div>
                    <div class="add-product col-12 d-flex  ">
                        <select name="" class="col-6" id="size-choose">
                            <option value="">XS</option>
                            <option value="">S</option>
                            <option value="">M</option>
                            <option value="">L</option>
                            <option value="">XL</option>
                        </select>
                        <div class="ml-3 col-4">
                            <input id="spinner" type="text">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="add-cart col-5">加入購物車</div>
                    </div>
                </div>


                <!-- botslide -->

                <div class=" bot-high row order-5  col-12  my-3 ">

                    <!-- bot-slide-01 -->
                    <?php $j=1?>
                    @foreach ($product->productMainImg as $mainImg)
                        <div class="bot_{{$j}} swiper-container d-none col-lg-8 col-sm-12 col-12  gallery-thumbs "
                            style="width: 100px;">
                            <div class="swiper-wrapper">
                                @foreach ($mainImg->productInfoImg as $infoImg)
                                    <div class="swiper-slide" style="background-image:url({{ $infoImg->imageUrl }})">
                                    </div>
                                @endforeach
                                    <?php $j++?>
                            </div>
                        </div>
                    @endforeach

                </div>
            </right-side>
        </div>


    </div>



    <!-- lightbox-rule -->
    <div class="portfolio-lightbox" id="portfolio-rule">
        <a href="#portfolio" class="close"></a>

        <div class="portfolio-lightbox__content  col-lg-10 col-md-10 col-sm-10 ">

            <img src="https://img.notorious-2019.com/47826bbf378818d3784bd337.jpg" alt="">
        </div>
    </div>

    <div>
        <div class="container p-0">
            <div class="pt-4 mb-3 pb-1" id="myTab">
                商品詳細規格
            </div>
            <img class="col-12" src="https://img.notorious-2019.com/8493d43351143a15114af951.jpg" alt="">
        </div>
    </div>

@endsection

@section('js')



    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'>
    </script> --}}
    {{-- <script
        src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.js'></script>
    --}}



    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}
    {{-- <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script> --}}

    <!-- spinner -->
    <script src="/js/productInfo/jquery-spinner-ui.js"></script>
    <script src="/js/productInfo/spinner.js"></script>
    <script src="/js/productInfo/jquery.js"></script>

    <script>
        var btn = document.querySelectorAll(".btn-coumston")
        // console.log(btn);
        var top_content = document.querySelectorAll(".top_1")
        var bot_content = document.querySelectorAll(".bot_1")
        // var top = document.querySelectorAll(".gallery-top")
        // var bot = document.querySelectorAll(".gallery-thumbs")

        // console.log(top);
        // console.log(bot);


        top_content[0].classList.remove('d-none')
        bot_content[0].classList.remove('d-none')


        // swiper1 = new Swiper('.swiper-container', {
        //     observer: true,//修改swiper自己或子元素時，自動初始化swiper
        //     observeParents: true//修改swiper的父元素時，自動初始化swiper
        // });


        for (let i = 0; i < btn.length; i++) {

            // top_content[i].classList.remove('d-none')
            // bot_content[i].classList.remove('d-none')

            btn[i].onclick = function() {
                var top = document.querySelectorAll(".gallery-top")
                var bot = document.querySelectorAll(".gallery-thumbs")
                top_content[0].classList.remove('d-none')
                bot_content[0].classList.remove('d-none')
                // for (let r = 0; r < top_content.length; r++) {
                //     // top_content[r].classList.add('d-none')
                //     // bot_content[r].classList.add('d-none')

                // }

                $('.gallery-top').addClass('d-none');
                // $('gallery-top').addClass('d-none');
                $('.gallery-thumbs').addClass('d-none');


                top[i].classList.remove('d-none');

                bot[i].classList.remove('d-none');




            }
            console.log(i);
        }
        // <script src="./js/porduct_info.js">

    </script>

    {{-- Swiper --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    --}}


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/js/productInfo/product_info.js"></script>
    {{-- <script>
        var galleryThumbs1 = new Swiper('.bot_2', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            observer: true, //修改swiper自己或子元素时，自动初始化swiper

            observeParents: true //修改swiper的父元素时，自动初始化swiper
        });
        var galleryTop1 = new Swiper('.top_2', {
            spaceBetween: 10,
            loop: true,
            loopedSlides: 5, //looped slides should be the same
            navigation: {
                nextEl: '.btn_next1',
                prevEl: '.btn_prev1',
            },
            thumbs: {
                swiper: galleryThumbs1,
            },
            observer: true, //修改swiper自己或子元素时，自动初始化swiper

            observeParents: true //修改swiper的父元素时，自动初始化swiper
        });

    </script> --}}
@endsection
