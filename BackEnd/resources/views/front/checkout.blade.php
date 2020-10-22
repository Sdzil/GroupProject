@extends('layouts/nav_footer')

@section('css')
<link rel="stylesheet" href="/css/news.css">
<style>
    .Cart {
        max-width: 100%;
        margin: 50px auto;
    }

    .Cart__header {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr 1fr;
        grid-gap: 2px;
        margin-bottom: 2px;
    }

    .Cart__headerGrid {
        text-align: center;
        background: #f3f3f3;
    }

    .Cart__product {
        display: grid;
        grid-template-columns: 2fr 7fr 3fr 3fr 3fr;
        grid-gap: 2px;
        margin-bottom: 2px;
        height: 70px;
    }

    .Cart__productGrid {
        padding: 5px;
    }

    .Cart__productImg {
        background-image: url(https://fakeimg.pl/640x480/c0cfe8/?text=Img);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .Cart__productTitle {
        overflow: hidden;
        line-height: 25px;
    }

    .Cart__productPrice,
    .Cart__productQuantity,
    .Cart__productTotal,
    .Cart__productDel {
        text-align: center;
        line-height: 60px;
    }

    @media screen and (max-width: 820px) {
        .Cart__header {
            display: none;
        }

        .Cart__product {
            box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.5);
            margin-bottom: 10px;
            grid-template-rows: 1fr 1fr;
            grid-template-columns: 2fr 2fr 2fr 2fr 2fr 2fr 1fr;
            grid-template-areas:
                "img title title title title title del"
                "img price price quantity total total del";
        }

        .Cart__productImg {
            grid-area: img;
        }

        .Cart__productTitle {
            grid-area: title;
        }

        .Cart__productPrice,
        .Cart__productQuantity,
        .Cart__productTotal,
        .Cart__productDel {
            line-height: initial;
        }

        .Cart__productPrice {
            grid-area: price;
            text-align: right;
        }

        .Cart__productQuantity {
            grid-area: quantity;
            text-align: left;
        }

        .Cart__productQuantity::before {
            content: "x";
        }

        .Cart__productTotal {
            grid-area: total;
            text-align: right;
            color: red;
        }

        .Cart__productDel {
            grid-area: del;
            line-height: 60px;
            background: #ffc0cb26;
        }
    }

    .input-groups {
        display: flex;
    }

    .input-groups div{
        border: 1px solid #333;
        padding: 10px 20px;
        cursor: pointer;
    }

    .input-groups div.active{
        color: #fff;
        background-color: #333;
    }

    .input-groups div:last-child{
        border-left: none;
    }
</style>
@endsection

@section('content')

<section class="news">
    <div class="container">
        <div class="Cart">
            <div class="Cart__header">
                <div class="Cart__headerGrid">商品</div>
                <div class="Cart__headerGrid">單價</div>
                <div class="Cart__headerGrid">數量</div>
                <div class="Cart__headerGrid">小計</div>
            </div>
            @foreach ($cart_items as $item)
            <div class="Cart__product">
                <div class="Cart__productGrid Cart__productImg"></div>
                <div class="Cart__productGrid Cart__productTitle">
                    {{$item->name}}
                </div>
                <div class="Cart__productGrid Cart__productPrice">${{$item->price}}</div>
                <div class="Cart__productGrid Cart__productQuantity">
                    {{$item->quantity}}
                </div>
                <div class="Cart__productGrid Cart__productTotal">${{$item->price * $item->quantity}}</div>
            </div>
            @endforeach
        </div>

        總金額: ${{$total_price}}

        <hr>
        <h1>收件人資訊</h1>

        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="receive_name">收件人名稱<small class="text-danger">(*必填)</small></label>
                <input type="text" class="form-control" id="receive_name" name="receive_name" required>
            </div>
            <div class="form-group">
                <label for="receive_phone">聯絡電話<small class="text-danger">(*必填)</small></label>
                <input type="tel" class="form-control" id="receive_phone" name="receive_name" required>
            </div>
            <div class="form-group">
                <label for="receive_mobile">手機</label>
                <input type="tel" class="form-control" id="receive_mobile" name="receive_mobile">
            </div>
            <div class="form-group">
                <label for="receive_address">地址<small class="text-danger">(*必填)</small></label>
                <input type="text" class="form-control" id="receive_address" name="receive_address" required>
            </div>
            <div class="form-group">
                <label for="receive_email">EMAIL<small class="text-danger">(*必填)</small></label>
                <input type="email" class="form-control" id="receive_email" name="receive_email" required>
            </div>
            <div id="receipt-form-group" class="form-group">
                <label for="receipt">發票方式<small class="text-danger">(*必填)</small></label>
                <input type="text" class="form-control" id="receipt" name="receipt" value="二聯式發票" hidden required>
                <div class="input-groups">
                    <div class="active input-groups-btn">二聯式發票</div>
                    <div class="input-groups-btn">三聯式發票</div>
                </div>
            </div>
            <div id="time-send-form-group" class="form-group">
                <label for="time_to_send">收貨時間<small class="text-danger">(*必填)</small></label>
                <input type="text" class="form-control" id="time_to_send" name="time_to_send" value="早上" hidden required>
                <div class="input-groups">
                    <div class="active input-groups-btn">早上</div>
                    <div class="input-groups-btn">中午</div>
                    <div class="input-groups-btn">晚上</div>
                </div>
            </div>
            <div class="form-group">
                <label for="remark">備註</label>
                <textarea class="form-control" id="remark" rows="3" name="remark"></textarea>
            </div>

            <button class="btn btn-success">送出</button>
        </form>

    </div>
</section>
@endsection


@section('js')
<script>
    $('#receipt-form-group .input-groups-btn').click(function(){
        $('#receipt-form-group .input-groups-btn').removeClass("active");
        $(this).addClass("active");
        $('#receipt').val(this.innerText);
    });

    $('#time-send-form-group .input-groups-btn').click(function(){
        $('#time-send-form-group .input-groups-btn').removeClass("active");
        $(this).addClass("active");
        $('#time_to_send').val(this.innerText);
    });
</script>
@endsection
