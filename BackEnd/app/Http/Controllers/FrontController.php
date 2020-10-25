<?php

namespace App\Http\Controllers;

use App\Banner;
use App\News;
use App\Product;
use App\ProductClass;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // $productClasses = ProductClass::with('productMainClass')->get();
        $banners = Banner::get();
        $productClass = ProductClass::with("productType")->get();
        $product = $productClass->all();

        $sport_1 = Product::where('product_type_id','19')->first();
        $sport_2 = Product::where('product_type_id','20')->first();
        $sport_3 = Product::where('product_type_id','21')->first();

        $news = News::orderBy('sort','desc')->get()->all();

        // dd($news);

        $sport = [$sport_1, $sport_2, $sport_3];

        // dd($sport_all);

        return view('front.index', compact('banners', 'product', 'sport', 'news'));
    }
}

