<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Media;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminBrand extends Controller
{
    use Media;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.brand.add', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:brands|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $file = $request->file('image');
        $fileData = $this->uploadPhoto($file, 'brands');
        $photo = $fileData["filePath"];

        $brand = new Brand();
        $brand->name = $validated['name'];
        $brand->image = $photo;
        $brand->save();

        return redirect()->route("adminBrand.index");
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
    public function edit(Request $request, Brand $brand)
    {

        return view('admin.brand.edit', compact('brand'));

        // dd($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:brands,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($file = $request->file('image')) {
            $fileData = $this->uploadPhoto($file, 'brands');
            $photo = $fileData["filePath"];
        $brand->image = $photo;

        }
        $brand->name = $validated['name'];
        $brand->save();
        return redirect()->route("adminBrand.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {

        $brand->delete();
        return redirect()->route("adminBrand.index");
    }
}
