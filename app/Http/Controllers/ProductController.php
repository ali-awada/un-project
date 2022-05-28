<?php

namespace App\Http\Controllers;

use App\Helper\Media;
use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;

class ProductController extends Controller
{

    use Media;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'currency', 'brand')->orderBy('id', 'desc')->get();
        return view('user.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $currencies = Currency::all();
        $brands = Brand::all();
        return  view('user.product.add', compact("categories", "currencies", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {


        $validated = $request->validate([
            'ar_name' => 'required|unique:products|min:3',
            'fr_name' => 'required|unique:products|min:3',
            'en_name' => 'required|unique:products|min:3',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'condition' => 'required|min:3',
            'category_id' => 'required|exists:products,id',
            'currency_id' => 'required|exists:products,id',
            'brand_id' => 'required|exists:products,id',
        ]);

        $product = new Product();
        $product->ar_name = $validated['ar_name'];
        $product->fr_name = $validated['fr_name'];
        $product->en_name = $validated['en_name'];
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];
        $product->condition = $validated['condition'];
        $product->category_id =  $validated['category_id'];
        $product->currency_id =  $validated['currency_id'];
        $product->brand_id =  $validated['brand_id'];
        $product->save();
        $files = $request->file('image');
        for ($i = 0; $i < count($files); $i++) {
            $fileData = $this->uploadPhoto($files[$i], 'products');
            $data = $fileData["filePath"];
            $productImage = new ProductImage();
            $productImage->url = $data;
            $productImage->product_id = $product->id;
            $productImage->save();
        }

        return redirect()->route("product.index");

        // // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $categories = Category::all();
        $currencies = Currency::all();
        $brands = Brand::all();
        return view('user.product.edit', compact("product", "categories", "currencies", "brands"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
