<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //這樣抓確實會把關聯項目一起抓出來
        $products = Product::with('productType')->with('productMainImg')->get();
        // dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::get();

        return view('admin.products.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //取得表單內所有資料
        //資料內含要存去
        $requestData = $request->all();

        //新增之後順便取得ID
        //這時候資料庫內的Item資料表已經填好新內容了
        $id =  Product::create($requestData)->id;

        //如果表單內有多張圖上傳
        //ToDo:多張圖丟到productMainImgs裡面去
        //下面五行先註解  記得改
        // if ($request->hasFile('image_url')) {
        //     $file = $request->file('image_url');
        //     $path = $this->fileUpload($file, 'items');
        //      這邊路徑不在$requestData內了  記得改去productMainImgs裡面去
        //     $requestData['image_url'] = $path;
        // }

        //這邊是再繼續做如果有多圖，填入ProductInfoImg資料表的部分
        // if($request->hasFile('imgs'))
        // {
        //     $files = $request->file('imgs');
        //     //多張圖片作為陣列處理
        //     foreach ($files as $file) {
        //         //圖片路徑處理
        //         $path = $this->fileUpload($file,'product_imgs');
        //         //新增資料進DB
        //         $product_img = new ProductImg;
        //         $product_img->product_id = $id;
        //         $product_img->img_url = $path;
        //         $product_img->save();

        //     }
        // }

        return redirect('admin/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
