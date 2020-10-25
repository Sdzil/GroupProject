@extends('layouts/front_layouts')

@section('css')

    <title>聯絡我們</title>
    <link rel="stylesheet" href="/css/contacts/contact_us.css">

    <link rel="stylesheet" href="/css/contacts/rwd.css">

@endsection


@section('main')

    <nav>
        <div id="banner">

            <div id="contact_nav">
                <div id="contact_banner">
                    <div class="left_banner offset-lg-2">
                    </div>
                    <div class="right_banner">
                        <h1>聯絡我們</h1>
                        <p>提供任何有關產品服務與常見問題的解答</p>
                    </div>

                </div>
            </div>
        </div>

    </nav>

    <div id="content">


        <div id="contact_us">
            <div id="about_us">
                <h2>惡名昭彰股份有限公司<br>
                    Notorious Taiwan</h2>
                <p>總公司:台灣新北市林口區文化二路二段177號</p>
                <p>電話:02 2601 3998</p>
                <P></P>


            </div>



            <div id="contact_card">
                <div id="card_container" class="container-fluid">

                    <div id="contact_title">
                        <h2>
                            聯絡表單
                        </h2>
                        <small>
                            如果您有任何疑問，請隨時與我們聯繫，謝謝。
                        </small>

                    </div>
                    <form id="contact_detail" action="/contacts/store" method="POST">

                        @csrf

                        <div class="row">
                            <div id="name_input" class="contact_box col-lg-6 ">
                                <div id="name_id">●姓名
                                    <small>
                                        請輸入您的姓名
                                    </small>
                                </div>
                                <input id="name" type="text" name="name" required>

                            </div>
                            <div id="contact_input" class="contact_box col-lg-6 ">
                                <div id="phone_id">●電話號碼
                                    <small>
                                        請輸入您的電話號碼
                                    </small>
                                </div>
                                <input id="phoneNumber" type="text" name="phoneNumber" required>

                            </div>
                        </div>

                        <div id="address_input" class="contact_box">
                            <div id="phone_id">●地址
                                <small>
                                    請輸入正確的聯繫地址
                                </small>
                            </div>
                            <input id="address" type="text" name="address" required>

                        </div>
                        <div id="email_input" class="contact_box">
                            <div id="phone_id">●信箱
                                <small>
                                    請輸入您的電子郵件
                                </small>
                            </div>
                            <input id="email" type="email" name="email" required>

                        </div>
                        <div id="problem_input" class="contact_box">
                            <div id="phone_id">●主旨
                                <small>
                                    請挑選你遇到的產品問題分類
                                </small>
                            </div>

                            <select id="subject" name="subject" required>

                                <optgroup label="您的問題">
                                    <option value="保固與服務">保固與服務</option>
                                    <option value="退換貨相關">退換貨相關</option>
                                    <option value="尋找或購買商品">尋找或購買商品</option>
                                    <option value="其他">其他</option>
                                </optgroup>
                            </select>

                        </div>


                        <div id="talk_input" class="contact_box">
                            <div id="content">●問題描述
                                <small>
                                    請詳細說明您在使用該產品時遇到的問題。
                                </small>
                            </div>
                            <input id="content" type="text" name="content" required>

                        </div>

                        <div id="btn_row" class="row  mt-4" style="display: block">
                            <button type="reset" class="btn btn-primary btn-lg active offset-lg-4 offset-sm-3"
                                aria-pressed="true">重新填寫</button>

                            <button type="submit" class="btn btn-secondary btn-lg active offset-sm-1"
                                aria-pressed="true">送出</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>

    </div>
    </div>

@endsection




@section('js')

@endsection
{{--
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
                        <div class="phone ">電話 (02) 2601-3998 </div>
                        <div class="serve">服務時間：12:00~21:00</div>
                        <!-- <div class="ig">IG:https://www.instagram.com/Notorious_Taiwan/</div> -->

                    </div>
                </div>
            </div>


        </div>



    </div>





</footer> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}


<!-- <div class="formBtn">
            <button class="reset" type="reset" form="maintance">重新填寫</button>
            <button class="submit" type="button" form="maintance">送出</button>
        </div> -->



{{--

</body>

</html> --}}
