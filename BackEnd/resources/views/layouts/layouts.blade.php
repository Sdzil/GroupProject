<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/css/index sass.css">
    <link rel="stylesheet" href="/js/nav.js">
    <link rel="stylesheet" href="/css/rwd.css">
    <link rel="stylesheet" href="/css/nav.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @yield('css')

</head>

<body>

    <nav>
        <div id="index_banner">

            <div id="top_nav">
                <div class="container-fluid">

                    <div id="member" class="col-1 col-1 text_dis text-nowrap">
                        <a href="" style="color:white">會員登入</a>
                    </div>
                    <div id="nav_logo" class="col-2 offset-xl-4 offset-lg-2"></div>
                    <div id="buycar" class="col-1 offset-xl-1">
                        <a href=""><img src="/image/shopping-cart.png" alt="" id="buycar_img"></a>
                    </div>
                    <div id="nav_contact" class="col-md-2 col-xl-1 text-nowrap">
                        <a href="" style="color:white">聯絡我們</a>
                    </div>
                    <div id="live" class="col-2">
                        <a href="">
                            <h1 class="ml2" style="color:red">直播間</h1>
                        </a>
                    </div>
                </div>
            </div>
            <nav role="navigation" id="Hamburger">
                <div id="menuToggle">
                    <!--
                  A fake / hidden checkbox is used as click reciever,
                  so you can use the :checked selector on it.
                  -->
                    <input type="checkbox" />

                    <!--
                  Some spans to act as a hamburger.

                  They are acting like a real hamburger,
                  not that McDonalds stuff.
                  -->
                    <span></span>
                    <span></span>
                    <span></span>

                    <!--
                  Too bad the menu has to be inside of the button
                  but hey, it's pure CSS magic.
                  -->
                    <ul id="menu">
                        <a href="#">
                            <li>會員登入</li>
                        </a>
                        <a href="#">
                            <li>聯絡我們</li>
                        </a>
                        <a href="#">
                            <li>直播間</li>
                        </a>

                        <a href="https://erikterwan.com/">
                            <li>購物車</li>
                        </a>
                    </ul>
                </div>
            </nav>


            <div id="bottom_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-3 middle">
                            <a href="" style="color:white">最新消息</a>
                        </div>
                        <div class="col-3 middle">
                            <a href="" style="color:white">鬼滅之刃</a>
                        </div>
                        <div class="col-3 middle">
                            <a href="" style="color:white">流行服飾</a>
                        </div>
                        <div class="col-3 middle">
                            <a href="" style="color:white">運動保健</a>
                        </div>

                    </div>
                </div>


            </div>
        </div>






    </nav>

    @yield('main')



    <footer>
        <div id="all_footer">



            <div id="top_footer">

            </div>
            <div id="left_footer">

                <div id="leftfooter_content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2 whitecolor offset-lg-1 text-nowrap"><a href="" style="color:white">保固與服務</a></div>
                            <div class="col-2 whitecolor text-nowrap" ><a href="" style="color:white">退換貨相關</a></div>
                            <div class="col-3 whitecolor text-nowrap"><a href="" style="color:white">尋找或購買商品</a></div>
                            <div class="col-1 whitecolor text-nowrap"><a href="" style="color:white">其他</a></div>
                            <div class="col-2 whitecolor text-nowrap"><a href="" style="color:white">聯絡我們</a></div>

                        </div>

                    </div>
                    <div id="footer_logo" class="offset-lg-1"></div>
                    <div id="copyright">
                        <p>©練習使用</p>
                    </div>
                </div>


            </div>

            <div id="right_footer">
                <a href="#">


                    <div id="gototop" class="">跳至置頂
                        <div id="gototop_photo">

                        </div>
                    </div>
                </a>

                <div id="rightfooter_content">
                    <h3>追蹤我們</h3>
                    <div class="continer">
                        <div id="row_height" class="row">
                            <div class="icon "></div>
                            <div class="icon image1  "></div>
                            <div class="icon "></div>
                            <div class="icon "></div>
                        </div>
                        <div class="row">
                            <div class="phone ">電話 (02) 2601-3998 </div>
                            <div class="serve offset-1">服務時間：12:00~21:00</div>
                            <div class="ig">IG:https://www.instagram.com/Notorious_Taiwan/</div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </footer>

    <script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>


    </script>
    @yield('js')

    <script src="./js/nav.js"></script>
</body>
