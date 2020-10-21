<?php

namespace App\Http\Controllers;

use App\ProductClass;
use App\ProductMainClass;
use Illuminate\Http\Request;

class ProductClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productClasses = ProductClass::with('productMainClass')->get();

        return view('admin.productClasses.index', compact('productClasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit_productMainClasses = ProductMainClass::get();
        return view('admin.productClasses.create', compact('edit_productMainClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductClass::create($request->all());

        return redirect('admin/productClasses');
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
        $edit_productClass = ProductClass::find($id);
        $edit_productMainClasses = ProductMainClass::get();
        // dd($edit_productMainClasses);
        return view('admin.productClasses.edit', compact('edit_productClass', 'edit_productMainClasses'));

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
        // dd($request);
        $productClass = ProductClass::find($id);
        $productClass->update($request->all());

        return redirect('admin/productClasses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productClass = ProductClass::find($id);
        $productClass->delete();

        return redirect('/admin/productClasses');
    }
}
