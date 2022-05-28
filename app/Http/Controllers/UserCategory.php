<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class UserCategory extends Controller
{
    public function show($id)
    {
        $category = Category::where('id', '=', $id)->with('products')->first();
        return view('user.showCategoryProducts', compact('category'));
    }
}
