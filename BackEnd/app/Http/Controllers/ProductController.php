<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductInfoImg;
use App\ProductMainImg;
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
        // $length = sizeof($products->all());
        // dd($length);
        // dd(json_decode($products->all()[0]->productinfo));
        // for ($i=0; $i < $length; $i++) {
        // //    $arrs[$i] = json_decode($products->all()[$i]->productInfo);
        //    $arrs[$i] = $i;
        // }
        $productTypes = ProductType::orderBy('sort', 'desc')->get();
        // dd($arrs);
        // $key = key($arr[3][0]);
        // dd(key($arr[3][0]), $arr[3][0]->$key);
        // dd((sizeof($products->all())));
        return view('admin.products.index', compact('products', 'productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::orderBy('sort', 'desc')->get();

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
        // $requestData = $request->all();

        // $id = 0;
        // $all = $request->has('stockType_'.$id);
        $all = $request->all();
        // $temp = "stockType_".$id;


        // for ($i=0;  ; $i++) {
        //     if($request->has('stockType_'.$i)){
        //     $stocktype = $request->get("stockType_".$i);
        //     $amount = $request->get("qty_".$i);
        //     $a[$i] = ["type" => $stocktype,"amount" => $amount];
        //     }else{
        //         break;
        //     }
        // }

        // $info = json_encode($a);
        // dd($a,$info);
        // $requestData = $request->hasFile("mainImageurl_".$id);
        // $requestData = $request->file();

        //  dd($temp,$all, gettype($all), $stocktype, $amount, $a);//可以取得相對應資料

        //新增之後順便取得ID
        //這時候資料庫內的products資料表已經填好新內容了
        //這邊取得id是要給主視覺圖做關聯
        $productId =  Product::create($all)->id;

        $productTemp = Product::find($productId);
        // $productTemp->productInfo =$info;
        $productTemp->save();

        for ($i=0;  ; $i++) {
            if($request->hasFile('mainImageurl_'.$i)){
                //先上傳主視覺圖
                $mainImg = new ProductMainImg;
                $file = $request->file('mainImageurl_'.$i);
                $path = $this->fileUpload($file, 'mainImgs');
                $mainImg->imageUrl = $path;
                $mainImg->product_id = $productId;
                $mainImg->save();

                $mainImgId = $mainImg->id;

                if($request->hasFile('infoImageurl_'.$i))
                    {
                        $files = $request->file('infoImageurl_'.$i);
                        //多張圖片作為陣列處理
                        foreach ($files as $file) {
                            //圖片路徑處理
                            $path = $this->fileUpload($file,'infoImgs');
                            //新增資料進DB
                            $infoImg = new ProductInfoImg;
                            $infoImg->product_main_img_id = $mainImgId;
                            $infoImg->imageUrl = $path;
                            $infoImg->save();

                        }
                    }

            }else{
            break;

            }

        }
        // dd('stop');
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

        return redirect('admin/products');
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
        $product = Product::with('productType')->with('productMainImg')->find($id);

        // dd(json_decode($products->all()[0]->productinfo));

        // dd($product->productMainImg);
           $arrs= json_decode($product->productInfo);


        $productTypes = ProductType::orderBy('sort', 'desc')->get();

        return view('admin.products.edit', compact('product','arrs', 'productTypes'));
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
        // dd($request->all(), $id);
        $product = Product::find($id);
        $product->update($request->all());

        return redirect('admin/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productClass = Product::find($id);
        $productClass->delete();
    }

    private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }
}
