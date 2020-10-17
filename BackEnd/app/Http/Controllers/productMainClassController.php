<?php

namespace App\Http\Controllers;

use App\productMainClass;
use Illuminate\Http\Request;

class productMainClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productMainClasses = productMainClass::get();
        // dd($item_types);
        return view('admin.productMainClasses.index', compact('productMainClasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productMainClasses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        productMainClass::create($request->all());

        return redirect('admin/productMainClasses');
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
        $edit_productMainClass = productMainClass::find($id);
        // dd($edit_productMainClass);
        // , compact('edit_productMainClass')
        return view('admin.productMainClasses.edit', compact('edit_productMainClass'));
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
        $productMainClass = productMainClass::find($id);

        $productMainClass->update($request->all());

        return redirect('admin/productMainClasses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productMainClass = productMainClass::find($id);

        $productMainClass->delete();

        return redirect('/admin/productMainClasses');
    }
}
