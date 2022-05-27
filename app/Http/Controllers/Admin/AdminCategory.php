<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Media;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCategory extends Controller
{
    use Media;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.add', compact('categories'));
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
            'ar_name' => 'required|unique:categories|min:3',
            'fr_name' => 'required|unique:categories|min:3',
            'en_name' => 'required|unique:categories|min:3',
            'parent_id' => 'sometimes|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $file = $request->file('image');
        $fileData = $this->uploadPhoto($file, 'categories');
        $photo = $fileData["filePath"];
        $category = new Category();
        $category->ar_name = $validated['ar_name'];
        $category->fr_name = $validated['fr_name'];
        $category->en_name = $validated['en_name'];
        $category->parent_id = $validated['parent_id'];
        $category->image = $photo;
        $category->save();

        return redirect()->route("adminCategory.index");
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
    // public function edit($id)
    // {
    //     $category = Category::all();
    //     return view('admin.category.edit', compact('category'));
    // }

    public function edit(Request $request, Category $category)
    {
        $categories = Category::all()->where("parent_id",null);
        
        return view('admin.category.edit', compact('category','categories'));

        // dd($categories);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'ar_name' => 'required|unique:categories,id|min:3',
            'parent_id' => 'sometimes|exists:categories,id',
            'fr_name' => 'required|unique:categories,id|min:3',
            'en_name' => 'required|unique:categories,id|min:3',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($file = $request->file('image')) {
            $fileData = $this->uploadPhoto($file, 'categories');
            $photo = $fileData["filePath"];
            $category->image = $photo;
        }
        $category->ar_name = $validated["ar_name"];
        $category->fr_name = $validated["fr_name"];
        $category->en_name = $validated["en_name"];
        $category->parent_id = $validated["parent_id"];
        $category->save();
        return redirect()->route("adminCategory.index");

        // if ($file = $request->file('image')) {
        //     $fileData = $this->uploadPhoto($file, 'brands');
        //     $photo = $fileData["filePath"];
        // }
        // $brand->name = $validated['name'];
        // $brand->image = $photo;
        // $brand->save();
        // return redirect()->route("adminBrand.index");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {

        $Category->delete();
        return redirect()->route("adminCategory.index");
    }
}
