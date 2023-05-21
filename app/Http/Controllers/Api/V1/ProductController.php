<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\v1\ProductResource;
use App\Http\Resources\v1\ProductCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(Product::all());
//        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function test(){
        return response()->json(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage'] = $imageUrl;

        Product::create($input);
    }

//    public function store(StoreProductRequest $request)
//    {
//
//    }

    public function subcategory($id){
        //subcategory
//        return DB::table('categories')
//            ->join('product_category','categories.id','=','product_category.category_id')
//            ->join('products','products.id','=','product_category.product_id')
//            ->where('categories.id',$id)
//            ->get();

        //subcategory
//        return DB::table('categories')
//            ->join('product_category','categories.id','=','product_category.subcategory_id')
//            ->join('products','products.id','=','product_category.product_id')
//            ->select('products.*','categories.name as subcat')
//            ->where('categories.id',$id)
//            ->where('categories.layer',1)
//            ->get();

        //subcategory child
//        return DB::table('categories')
//            ->join('product_category','categories.id','=','product_category.child_subcategory')
//            ->join('products','products.id','=','product_category.product_id')
//            ->select('products.*','categories.name as subcat')
//            ->where('categories.id',$id)
//            ->where('categories.layer',2)
//            ->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource(Product::find($product->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
