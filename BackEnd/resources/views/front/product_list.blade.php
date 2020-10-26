@extends('layouts/front_layouts')


@section('css')
    <title>商品列表</title>
    <link rel="stylesheet" href="/css/productList/product_list.css">
    {{-- <link rel="stylesheet" href="/css/productList/主頁sass.css"> --}}
@endsection


@section('main')

<div id="section1">
    <!--麵包屑-->
    <div id="breadcrumb">
      <div id="" class="title-contain col-xl-11 magrin-0_auto ">
        <ul class="breadcrumb">
          <li class="breadcrumb-item "><a href="">首頁
            </a></li>
          <li class="breadcrumb-item">潮流服飾</li>
        </ul>
      </div>

      <div class="col-xl-11 magrin-0_auto">
        <div class="now_page">潮流服飾</div>
      </div>
    </div>
</div>

  <div id="section2">
    <!--商品陳列-->
    <div class="container d-flex flex-wrap flex-xl-wrap flex-md-wrap justify-content-around col-xl-10 magrin-0_auto">

      <!-- card -->
        @foreach ($productclasses as $productclass)
            @foreach ($productclass->productType as $productT)
                @foreach ($productT->product as $cargos)

                    {{-- {{$cargos->productName}} --}}

                    <div class="card m-3 col-md-5 col-sm-12  row col-xl-3">
                        <a href="/product/cloth/{{$cargos->id}}" class="card-container ">
                          <div class="card-container-theme">
                            <div class="product_photo">
                              <img class="product_photo" src="{{$cargos->productMainImg[0]->imageUrl}}" alt="">
                              <div class="new_icon">NEW</div>
                              <div class="soldOut_icon">已售完</div>
                            </div>
                            <div class="product_info d-flex flex-column">
                              <div class="product_info-item colors ">
                                <div class="color red">
                                </div>
                                <div class="color black">
                                </div>
                                <div class="color white">
                                </div>
                                <div class="color blue">
                                </div>
                              </div>
                            <div class="product_info-item brand_name">惡名昭彰</div>
                              <div class="product_info-item product_name">{{$cargos->productName}}</div>
                              <div class="product_info-item product_price">${{$cargos->price}}</div>
                            </div>
                          </div>
                        </a>
                      </div>

                @endforeach
            @endforeach
        @endforeach


      <!-- card -->
      {{-- <!-- card -->
      <div class="card m-3 row col-md-5 col-sm-12  col-xl-3">
        <a href="" class="card-container ">
          <div class="card-container-theme">
            <div class="product_photo">
              <img class="product_photo" src="image/sample.png" alt="">
              <div class="new_icon">NEW</div>
              <div class="soldOut_icon">已售完</div>
            </div>
            <div class="product_info d-flex flex-column">
              <div class="product_info-item colors  ">
                <div class="color red">
                </div>
                <div class="color black">
                </div>
                <div class="color white">
                </div>
                <div class="color blue">
                </div>
              </div>
              <div class="product_info-item brand_name">惡名昭彰</div>
              <div class="product_info-item product_name">綜合冰淇淋組24入</div>
              <div class="product_info-item product_price">$1350</div>
            </div>

          </div>
        </a>
      </div>
      <!-- card -->
      <!-- card -->
      <div class="card m-3 row col-md-5 col-sm-12  col-xl-3">
        <a href="" class="card-container ">
          <div class="card-container-theme">
            <div class="product_photo">
              <img class="product_photo" src="image/sample.png" alt="">
              <div class="new_icon">NEW</div>
              <div class="soldOut_icon">已售完</div>
            </div>
            <div class="product_info d-flex flex-column">
              <div class="product_info-item colors  ">
                <div class="color red">
                </div>
                <div class="color black">
                </div>
                <div class="color white">
                </div>
                <div class="color blue">
                </div>
              </div>
              <div class="product_info-item brand_name">惡名昭彰</div>
              <div class="product_info-item product_name">綜合冰淇淋組24入</div>
              <div class="product_info-item product_price">$1350</div>
            </div>

          </div>
        </a>
      </div>
      <!-- card -->
      <!-- card -->
      <div class="card m-3 row col-md-5  col-sm-12    col-xl-3">
        <a href="" class="card-container ">
          <div class="card-container-theme">
            <div class="product_photo">
              <img class="product_photo" src="image/sample.png" alt="">
              <div class="new_icon">NEW</div>
              <div class="soldOut_icon">已售完</div>
            </div>
            <div class="product_info d-flex flex-column">
              <div class="product_info-item colors  ">
                <div class="color red">
                </div>
                <div class="color black">
                </div>
                <div class="color white">
                </div>
                <div class="color blue">
                </div>
              </div>
              <div class="product_info-item brand_name">惡名昭彰</div>
              <div class="product_info-item product_name">綜合冰淇淋組24入</div>
              <div class="product_info-item product_price">$1350</div>
            </div>

          </div>
        </a>
      </div>
      <!-- card --> --}}
      <div class="footer_block">

      </div>
    </div>


    </div>


</div>



@endsection




@section('js')

@endsection


