<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Document</title> --}}



    <link rel="stylesheet" href="/css/layouts/layouts.css">
    <link rel="stylesheet" href="/css/layouts/nav.css">
    <link rel="stylesheet" href="/css/layouts/rwd.css">
    <link rel="stylesheet" href="/css/layouts/lightbox.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    @yield('css')
</head>

<body>

    <nav>
        <div id="index_banner">

            <div id="top_nav">
                <div class="container-fluid">

                    <div id="member" class="col-1 col-1 text_dis text-nowrap">
                        <a href="#portfolio-member" style="color:white">會員登入</a>
                    </div>
                    <div id="nav_logo" class="col-2 offset-xl-4 offset-lg-2"></div>
                    <div id="buycar" class="col-1 offset-xl-1">
                        <a href=""><img src="/images/index/shopping-cart.png" alt="" id="buycar_img"></a>
                    </div>
                    <div id="nav_contact" class="col-md-2 col-xl-1 text-nowrap">
                        <a href="/contacts" style="color:white">聯絡我們</a>
                    </div>
                    <div id="live" class="col-2">
                        <a href="https://notorious-2019.com/live.aspx" target="_blank">
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
                        <a href="#portfolio-member">
                            <li>會員登入</li>
                        </a>
                        <a href="/contacts">
                            <li>聯絡我們</li>
                        </a>
                        <a href="https://notorious-2019.com/live.aspx" target="_blank">
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
                            <a href="/" style="color:white">首頁</a>
                        </div>
                        <div class="col-3 middle">
                            <a href="/news" style="color:white">最新消息</a>
                        </div>
                        <div class="col-3 middle">
                            <a href="/product/cloth" style="color:white">流行服飾</a>
                        </div>
                        <div class="col-3 middle">
                            <a href="/product/sport" style="color:white">運動保健</a>
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
                            <div class="col-sm-2 whitecolor offset-lg-1 text-nowrap"><a href=""
                                    style="color:white">保固與服務</a></div>
                            <div class="col-sm-2 whitecolor text-nowrap"><a href="" style="color:white">退換貨相關</a></div>
                            <div class="col-sm-3 whitecolor text-nowrap"><a href="" style="color:white">尋找或購買商品</a>
                            </div>
                            <div class="col-sm-1 whitecolor text-nowrap"><a href="" style="color:white">其他</a></div>
                            <div class="col-sm-2 whitecolor text-nowrap"><a href="" style="color:white">聯絡我們</a></div>

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


                    <div id="gototop" class="text-nowrap">跳至置頂
                        <div id="gototop_photo">

                        </div>
                    </div>
                </a>

                <div id="rightfooter_content">
                    <h3>追蹤我們</h3>
                    <div class="continer">
                        <div id="row_height" class="row">
                            <a href="https://www.instagram.com/notorious_taiwan/?utm_source=ig_embed" target="_blank">
                                <div class="icon image"></div>
                            </a>
                            <a href="https://www.facebook.com/notorious.taiwan/" target="_blank">
                                <div class="icon image1"></div>
                            </a>
                            <a href="https://www.youtube.com/playlist?list=PLFTRo7Saflr8YgKyRIznhSekFhjHl1GUf"
                                target="_blank">
                                <div class="icon image2"></div>
                            </a>
                        </div>
                        <div class="row" id="usphoto">
                            <div class="phone ">電話 (02) 2601-3998 </div><br>
                            <div class="serve">服務時間：12:00~21:00</div>
                            <!-- <div class="ig">IG:https://www.instagram.com/Notorious_Taiwan/</div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- LightBox -->
    <!-- 會員登入畫面 -->
    <div class="portfolio-lightbox" id="portfolio-member">
        <div class="portfolio-lightbox__content  col-lg-5 col-md-8 col-sm-8 col-xs-10">
            <a href="#portfolio" class="close"></a>
            <h3 class="portfolio__title">會員登入</h3>
            <p class="portfolio__body">
                {{-- <a href="{{ route('login') }}">Login</a> --}}
            <div class="login-form">
                {{-- <form action="{{ route('login') }}" class="form-horizontal" method="POST">
                    @csrf
                    <input type="hidden" name="act" value="act_login">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" name="login_email" class="form-control" id="login_email"
                                placeholder="請輸入帳號(Email)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="login_pwd" class="form-control" id="login_pwd"
                                placeholder="請輸入密碼">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-sm text-left ml-3">
                            <a href="#portfolio-registered" class="button-registered" role="button"
                                title="註冊帳號">註冊帳號</a>
                        </div>
                        <div class=" col-sm text-right mr-3">
                            <a href="#portfolio-forgotpsw" class="button-forgotpsw" role="button" title="忘記密碼">忘記密碼?</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-dark btn-default btn-lg col-md-12 ">登入</button>
                        </div>
                    </div>
                </Form> --}}

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" placeholder="請輸入帳號(Email)" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" placeholder="請輸入密碼" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}記住我
                                </label>
                            </div> --}}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{-- {{ __('Login') }} --}}
                                登入
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>


            <hr>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="button" id="fb_login"
                        class="btn btn-primary btn-lg col-md-12 ">使用facebook帳號登入</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <a href="/google.aspx"><button type="button"
                            class="btn btn-danger btn-lg  col-md-12">使用google帳號登入</button></a>
                </div>
            </div>
            </form>
        </div>
        </p>
    </div>
    </div>
    <!-- 忘記密碼畫面 -->
    <div class="portfolio-lightbox" id="portfolio-forgotpsw">
        <div class="portfolio-lightbox__content  col-lg-5 col-md-8 col-sm-8 col-xs-10">
            <a href="#portfolio" class="close"></a>
            <h3 class="portfolio__title ">忘記密碼</h3>
            <p class="portfolio__body">
            <div class="container">
                <div class="login">
                    <form action="login.aspx" class="form-horizontal" method="post" onsubmit="return checkadd()">
                        <div class="form-group">
                            <input type="text" class="form-control" name="forgot_email" placeholder="請輸入信箱(email)"">
                                        <hr>
                                        <p class=" form-control " style=" border: 0px; padding:
                                0px;">請您輸入註冊時的E-mail帳號，我們將寄送密碼至您的信箱。</p>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="btn btn-dark btn-default btn-lg col-md-12 ">發送信件</button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>


            </p>
        </div>
    </div>
    <!-- 會員註冊畫面 -->

    <div class="portfolio-lightbox" id="portfolio-registered">
        <div class="portfolio-lightbox__content  col-lg-5 col-md-8 col-sm-8 col-xs-10">
            <a href="#portfolio" class="close"></a>
            <h3 class="portfolio__title ">會員註冊</h3>
            <p class="portfolio__body">
            <div class="container">
                <div class="login">
                    <form action="{{ route('login') }}" class="form-horizontal" method="POST"
                        onsubmit="return checkadd()">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="registered_email" placeholder="信箱">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="registered_name" placeholder="姓名">
                        </div>
                        <div class=" form-group">
                            <input type="password" class="form-control" name="password" placeholder="密碼">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="請再次輸入密碼">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="submit" id="submit"
                                    class="btn btn-dark btn-default btn-lg col-md-12">立即註冊</button>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="button" id="fb_login"
                                    class="btn btn-primary btn-lg col-md-12 ">使用facebook帳號登入</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="/google.aspx"><button type="button"
                                        class="btn btn-danger btn-lg  col-md-12">使用google帳號登入</button></a>
                    </form>
                </div>
            </div>
            </p>
        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>

        {{-- Anime --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

        {{-- <script src="/js/index/lightbox.js"></script>
        --}}

        <!-- 表單驗證 -->
        <script src="https://cdn.bootcss.com/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

        <script src="/js/index/lightbox.js"></script>


        @yield('js')


</body>
