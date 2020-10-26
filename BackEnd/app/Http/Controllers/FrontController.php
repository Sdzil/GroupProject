<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Contact;
use App\News;
use App\Product;
use App\ProductMainClass;
use App\ProductClass;
use App\ProductType;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function layouts()
    {

        return view('layouts.front_layouts');

    }


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

    public function news()
    {

        $newsList = News::orderBy('sort','desc')->get()->all();


            // dd($newsList[0]->title);

        return view('front.news', compact('newsList'));

    }

    public function newsInfo($id)
    {

        $news = News::find($id);


            // dd($newsList[0]->title);

        return view('front.news_info', compact('news'));

    }

    public function cloth(){

        $productclasses = ProductMainClass::find(1)->productClass->all();
        // dd($productclasses[0]->productType[0]->product[0]->productMainImg[0]->imageUrl);

        return view('front.product_list', compact('productclasses'));
    }

    public function clothInfo($id){

       $product = Product::find($id);
    //    dd($product);

        return view('front.product_info', compact('product'));
    }

    public function sport(){

        $productclasses = ProductMainClass::find(2)->productClass->all();
        // dd($productclasses[0]->productType[0]->product[0]->productMainImg[0]->imageUrl);

        return view('front.product_list', compact('productclasses'));
    }

    public function sportInfo($id){

        $product = Product::find($id);
     //    dd($product);

         return view('front.product_list', compact('product'));
     }



    public function contacts()
    {

        return view('front.contacts');

    }

    public function contacts_store(Request $request)
    {

        // dd($request);
        Contact::create($request->all());

        return redirect('contacts');
    }

}

