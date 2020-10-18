<?php

namespace App\Http\Controllers;

use App\ProductClass;
use App\ProductMainClass;
use Illuminate\Http\Request;

use App\ProductType;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::with('productClass')->get();
        // dd($productTypes[0]->productClass->productMainClass);
        // dd($productClasses[0]->productMainClass->mainClassName);
        return view('admin.productTypes.index', compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create_productClasses = ProductClass::get();
        return view('admin.productTypes.create', compact('create_productClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductType::create($request->all());

        return redirect('admin/productTypes');
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
        $edit_productType = ProductType::find($id);
        $edit_productClasses = ProductClass::get();
        // dd($edit_productMainClass);
        return view('admin.productClasses.edit', compact('edit_productType', 'edit_productClasses'));

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
        $productType = ProductType::find($id);
        $productType->update($request->all());

        return redirect('admin/productTypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();

        return redirect('/admin/productTypes');
    }
}
