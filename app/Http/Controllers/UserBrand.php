<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class UserBrand extends Controller
{
    public function show($id)
    {
        $brand = Brand::where('id', '=', $id)->with('products')->first();
        return view('user.showBrandProduct', compact("brand"));
    }
}
