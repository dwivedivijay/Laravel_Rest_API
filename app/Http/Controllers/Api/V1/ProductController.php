<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return ProductResource::collection(Product::all());
        //return ProductResource::collection(Product::paginate(1));
        //return new ProductCollection(Product::paginate(1));
    }
    
    public function show(Product $product) {
        return new ProductResource($product);
    }

    public function create() {
        //
    }

    public function store(StoreProductRequest $request) {
        Product::create($request->validated());
        return response()->json('Product Created');
    }

    public function edit() {
        //
    }

    public function update(StoreProductRequest $request, Product $product) {
        $product->update($request->validated());
        return response()->json('Product Updated');
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json('Product Deleted');
    }

    
}
