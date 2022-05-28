<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProduct extends Controller
{
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->with("category", "currency", "brand", "images")->first();
        return view('user.showProduct', compact('product'));
    }
}
