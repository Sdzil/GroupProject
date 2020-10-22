<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductInfoImg;
use App\ProductMainImg;
use App\ProductType;
use App\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $products = Product::with('productType')->with('productMainImg')->with('stock')->get();
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
        // dd($request->all());
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

        // $productTemp = Product::find($productId);
        // $productTemp->productInfo =$info;
        // $productTemp->save();


        $sizeType = new Stock;
        $sizeType->size = "XS";
        $sizeType->amount = $all["size_XS"];
        $sizeType->product_id = $productId;
        $sizeType->save();
        $sizeType = new Stock;
        $sizeType->size = "S";
        $sizeType->amount = $all["size_S"];
        $sizeType->product_id = $productId;
        $sizeType->save();
        $sizeType = new Stock;
        $sizeType->size = "M";
        $sizeType->amount = $all["size_M"];
        $sizeType->product_id = $productId;
        $sizeType->save();
        $sizeType = new Stock;
        $sizeType->size = "L";
        $sizeType->amount = $all["size_L"];
        $sizeType->product_id = $productId;
        $sizeType->save();
        $sizeType = new Stock;
        $sizeType->size = "XL";
        $sizeType->amount = $all["size_XL"];
        $sizeType->product_id = $productId;
        $sizeType->save();



        for ($i=0; $i < 3 ; $i++) {
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
        $product = Product::with('productType')->with('productMainImg')->with('stock')->find($id);

        // dd(json_decode($products->all()[0]->productinfo));

        // dd($product->productMainImg);
        //    $arrs= json_decode($product->productInfo);
        // $stock = Product::with('stock')->find($id);

        // dd($stock);

        $productTypes = ProductType::orderBy('sort', 'desc')->get();

        return view('admin.products.edit', compact('product', 'productTypes'));
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

        $all = $request->all();
        dd($request->all(), $id);
        $product = Product::find($id);
        $product->update($request->all());

        $size_xs = Stock::where("product_id", $id)->where("size","XS")->get();
        $size_xs->amount = $all["size_XS"];
        $size_s = Stock::where("product_id", $id)->where("size","S")->get();
        $size_s->amount = $all["size_S"];
        $size_m = Stock::where("product_id", $id)->where("size","M")->get();
        $size_m->amount = $all["size_M"];
        $size_l = Stock::where("product_id", $id)->where("size","L")->get();
        $size_l->amount = $all["size_L"];
        $size_xl = Stock::where("product_id", $id)->where("size","XL")->get();
        $size_xl->amount = $all["size_XL"];


        $item = productMainImg::where("product_id",$id)->get();
        dd("編輯圖片未完成");
        $requestData = $request->all();
        if($request->hasFile('mainImageurl_0')) {
            $old_image = $item->imageUrl;
            $file = $request->file('mainImageurl_0');
            $path = $this->fileUpload($file,'mainImgs');
            $item->imageUrl = $path;
            $item->save();
            File::delete(public_path().$old_image);

        }



        if($request->hasFile('infoImageurl_0')) {
            $old_image = $item->infoImageUrl;
            $file = $request->file('infoImageUrl');
            $path = $this->fileUpload($file,'news');
            $requestData['infoImageUrl'] = $path;
            File::delete(public_path().$old_image);

        }

        $item->update($requestData);









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
