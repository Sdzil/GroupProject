<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if($request->hasFile('imageUrl')) {
            $file = $request->file('imageUrl');
            $path = $this->fileUpload($file,'banners');
            $requestData['imageUrl'] = $path;
        }
        Banner::create($requestData);

    return redirect('/admin/banners');
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
        $edit_banner= Banner::find($id);

        return view('admin.banners.edit', compact('edit_banner'));
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
        $banner = Banner::find($id);

        $requestData = $request->all();
        if($request->hasFile('imageUrl')) {
            //如果有上傳新圖

            $old_image = $banner->imageUrl;//取得舊圖片路徑
            $file = $request->file('imageUrl');//取得舊圖片檔案
            $path = $this->fileUpload($file,'banners');//取得新圖片預計要放的路徑，函式內把圖放到該路徑
            $requestData['imageUrl'] = $path;//將路徑放進物件中
            File::delete(public_path().$old_image);//刪除舊有圖片

        }

    $banner->update($requestData);//更新資料內容

    return redirect('/admin/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $old_image = $banner->imageUrl;//取得圖片路徑，看有沒有圖
        if(file_exists(public_path().$old_image)){
            //有圖就刪掉
            File::delete(public_path().$old_image);
        }

        //刪掉資料庫內的檔案
        $banner->delete();

        return redirect('/admin/banners');
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
