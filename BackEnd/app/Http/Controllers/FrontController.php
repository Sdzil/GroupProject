<?php

namespace App\Http\Controllers;

use App\Banner;
use App\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        $newsList = News::get();
        // dd($banners);
        return view('front/index', compact('banners', 'newsList'));
    }
}
