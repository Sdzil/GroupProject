@extends('layouts/layouts')


@section('css')


<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<style>


    .swiper-button-next{
        color: white;
        background-color: #444;
    }
    .swiper-button-prev{
        color:white;
        background-color: #444;
    }
</style>
@endsection


@section('main')

 <!-- Swiper -->
 <div class="swiper-container">


    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
        <div class="swiper-slide"><img width="100%" src="{{$banner->imageUrl}}" alt=""></div>
        @endforeach
      </div>


    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>


{{-- <div id="banners">
    <img width="100%" src="upload\banners\16033355261385974ed5904a438616ff7bdb3f7439.jpg" alt="">
</div> --}}

    <div id="section1">


        <div id="sectionmaue">

            <div id="leftmaue" data-aos="fade-right">

            </div>
            <div id="rightmaue">
                <div id="top_maue" data-aos="fade-left">
                    <div id="lasthover" class="mauebox textbox">
                        <p class="title">
                            流行服飾
                        </p>

                        <hr class="bottomline">
                        <p>
                            最時尚潮流的穿搭
                        </p>
                    </div>
                    <div id="photo1" class="mauebox flow">
                        <img class="photobox" src="https://img.notorious-2019.com/cf55db08199a4e3199456319.jpg" alt=""
                            width="100%" height="100%">

                    </div>
                </div>
                <div id="middle_maue" data-aos="fade-right">

                    <div class="mauebox textbox">
                        <p class="title">
                            流行服飾
                        </p>

                        <hr class="bottomline">
                        <p>
                            最時尚潮流的穿搭
                        </p>
                    </div>
                    <div id="photo2" class="mauebox flow">
                        <img class="photobox" src="https://img.notorious-2019.com/7a0ac87b43823c34384eee43.jpg" alt=""
                            width="100%" height="100%">
                    </div>
                </div>
                <div id="bottom_maue" data-aos="fade-left">
                    <div class="mauebox textbox">
                        <p class="title">
                            流行服飾
                        </p>

                        <hr class="bottomline">
                        <p>
                            最時尚潮流的穿搭
                        </p>
                    </div>
                    <div id="photo3" class="mauebox flow">
                        <img class="photobox" src="https://img.notorious-2019.com/c555c00a5312436531405153.jpg" alt=""
                            width="100%" height="100%">
                    </div>
                </div>

            </div>
        </div>



    </div>


    <div id="section2">

        <div id="sectioncard">
            <div class="leftbox" data-aos="zoom-in">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.notorious-2019.com/519c8827544f91154448f754.jpg"
                        class="card-img-top width=100% height=100%" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>

                </div>
                <div class="card" style="width: 18rem;">
                    <img src="https://img.notorious-2019.com/519c8827544f91154448f754.jpg" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>

                </div>
                <div class="card" style="width: 18rem;">
                    <img src="https://img.notorious-2019.com/519c8827544f91154448f754.jpg" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>

                </div>
            </div>
            <div class="parallax"></div>

            <div class="rightbox" data-aos="zoom-out-up">

                <p class="boxtitle">運動保健</p>
                <p class="boxtext">專業的營養補給</p>
                <div class="photoicon">

                    <div class="icon"></div>
                    <p class="text-nowrap">強身健體</p>

                </div>


            </div>





        </div>



    </div>



    <div id="section3">

        <div id="bigcard_section">


            <div id="bigcard_title">
                最新消息
            </div>

            <div class="black_decoration"></div>

            <div id="bigcard">
                @foreach ($newsList as $news)
                <div class="card" data-aos="fade-right" data-aos-offset="300"
                data-aos-easing="ease-in-sine">
                {{-- <img src="{{$news->listImageUrl}}" class="card-img-top" alt="..."> --}}

                @if ($news->listImageUrl == null)
                <img height="200" src='/upload/news/16033381990e65972dce68dad4d52d063967f0a705.jpg' alt="">
            @else
                <img height="200" src='{{ $news->listImageUrl }}' alt="">
            @endif
            {{-- 測試註解 --}}


                <div class="card-body">
                    <h5 class="card-title">{{$news->title}}</h5>
                    <p class="card-text">{{$news->content}}</p>
                    <div class="bottom_text">
                        <div class="card_date">張貼日期：{{$news->date}}</div>
                        <a href="#" class="btn btn-primary">MORE</a>
                    </div>
                </div>
                </div>
                @endforeach

{{--
                <div class="card"  data-aos="fade-up" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                    <img src="https://i.ytimg.com/vi/5ziJAIcdAFs/maxresdefault.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="bottom_text">
                            <div class="card_date">張貼日期</div>
                            <a href="#" class="btn btn-primary">MORE</a>
                        </div>
                    </div>
                </div>
                <div class="card"  data-aos="fade-left" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                    <img src="https://i.ytimg.com/vi/5ziJAIcdAFs/maxresdefault.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="bottom_text">
                            <div class="card_date">張貼日期</div>
                            <a href="#" class="btn btn-primary">MORE</a>
                        </div>

                    </div>
                </div> --}}

            </div>
            <div class="black_decoration"></div>
        </div>






    </div>


    <div id="section4">
        <div id="paralax_photo">
            <div class="smoke">
                <div class="container ">
                    <div class="row no-gutters">
                        <div class="col-xs-12 col-md-10 col-lg-6 text-md-left">
                            <div class="white-text">
                                <div class=" ani wow animated fadeIn " data-wow-delay="0.3s" data-wow-duration="2s">
                                    <h1 class="h1-responsive">館長 ‒ 陳之漢</h1>
                                    <div class="h5  mt-sm-5">
                                        <p style="text-align: left;">
                                            因感嘆台灣武術、台灣健美界資源缺乏決定培育下一代優秀的體育人才為了讓男女老少都能有強健的體魄跟防身格鬥的技術跟身手</p>
                                        <p style="text-align: left;">
                                            希望大家都能來參加並享受到最好的健身格鬥中心健身俱樂部 是我一生的夢想
                                        </p>
                                        <p style="text-align: left;">&nbsp;-此生願景 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>



    <section5>
        <div id="index_aboutus">
            <div id="about_title">
                <p id="us_title" class="offset-2">關於我們</p>
                <p id="sub_title" class="offset-2">Notorious致力於打造高品質的運動休閒服飾，以卓越機能性、耐洗不易變形、極致的親膚感為設計前提
                    ，並加入時尚潮流因子的平價服飾品牌。</p>


            </div>


            <div id="top_aboutus">
                <div class="container p-0 display-flex flex-wrap">
                    <div class="row">

                        <div class="col-lg-8 col-12 m-auto">
                            <div id="top_photo" data-aos="fade-right">

                            </div>
                        </div>
                        <div class="col-lg-4 col-12 m-auto">
                            <div class="top_title">
                                <p id="aboutus_title1">我們的堅持</p>
                                <p id="aboutus_subtitle" style="text-align: left;">堅持100% 台灣製造，台灣紡織技術為世界之最 ! ! !

                                    近年各大廠牌服飾皆在中國、越南、柬埔寨設廠，便宜成本的背後，除了做工品質極度不穩定之外，大量的剝削與血汗案例更不勝枚舉，這也是Notorious堅持在台灣本土生產的主要原因。比起剝削勞工壓低成本提高利潤，我們更希望為台灣成衣業貢獻一番心力，使台灣成衣業界可以不斷成長。我們更願意讓所有人，能夠不用花大錢，就可享受高品質，高CP值的運動服飾。
                                </p>




                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="bottom_aboutus">
                <div class="container p-0 display-flex flex-wrap">
                    <div class="row">
                        <div class="col-lg-4 col-12 m-auto order-1 order-lg-0 px-sm-2">
                            <div class="bottom_title ">
                                <p id="aboutus_title2">我們的信念</p>
                                <p id="aboutus_subtitle2">以品牌創始人 館長 ‒
                                    陳之漢的勇敢、堅毅、不服輸且拒絕向逆境低頭的個性為品牌宗旨，使得穿搭者只要穿上Notorious，也能深刻感受到本品牌所傳遞的信念。

                                    有夢想的人，總是招人妒忌的
                                    當全世界的人不看好你，不斷對你冷嘲熱諷時，你還能毫不猶豫的相信自己，憑藉著最初的信念持續往夢想前進嗎？
                                    不懼任何目光、持續往目標前進，哪怕肉體燃燒殆盡，無法撼動的</p>


                            </div>
                        </div>

                        <div class="col-lg-8 col-12 m-auto ">
                            <div id="bottom_photo" data-aos="fade-left">

                            </div>
                        </div>
                    </div>

                </div>

            </div>


    </section5>


    @endsection









@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script> -->












<script>


var botnav = document.querySelector("#bottom_nav");
var topnav = document.querySelector('#top_nav')

window.onresize = function () {
    console.log(botnav.offsetTop);
    // console.log("123");
}
// console.log(botnav.offsetTop);

scroll = window.scroll

function scroll() {
    alert("检测到页面滚动事件:" + window.pageXOffset + " " + window.pageYOffset);
}


function wheelDeltaFunc(topnav) {
    topnav = topnav || window.event;
    console.log(topnav)
    if (topnav.wheelDelta > 0) {
        //滾輪向上滾動
    }
    if (topnav.wheelDelta < 0) {
        //滾輪向下捲動
        topnav.innerHTML = "<style:background-color:black>"
    }
}


AOS.init();


</script>
@endsection

