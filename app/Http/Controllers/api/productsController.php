<?php

namespace App\Http\Controllers\api;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\productResource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class productsController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    const ACTIVE=1;
    public function index()
    {
        // $products=Product::all();
      $products= productResource::collection(Product::all());

        // return response()->json(compact('products'));
        // $mesg=["ok"];
        return $this->apiRes($products,"ok",200);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::select('id','brand_name')->where('status',self::ACTIVE)->get();
        $subCategories=SubCategory::select('id','sub_cat_name')->where('status',self::ACTIVE)->get();
        return response()->json(compact('brands','subCategories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|between:3,255|string',
                'name_en' => 'required|between:3,255|string',
                'price' => 'required|numeric|between:0.5,99999999,99',
                'quantity' => 'nullable|integer|between:1,9999',
                'code' => 'required|unique:products,code|digits:5',
                'status' => 'nullable|integer', Rule::in([0, 1]),
                'des_ar' => 'required|string',
                'des_en' => 'required|string',
                'sub_category_id' => 'required|integer|exists:sub_categories,id',
                'brand_id' => 'nullable|integer|exists:brands,id',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048'
    
        ]);
    
        if ($validator->fails()) {
            return $this->apiRes(null,$validator->errors(),400);
        }
        $product=Product::create($request->all());
       return  $product? $this->apiRes(new productResource($product),"product created",201):$this->apiRes(null,"not created",400);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //    $product=Product::find($id);
      $product= Product::find($id);

       
       return  $product? $this->apiRes(new productResource($product),"ok",200):$this->apiRes(null,"not found",404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|between:3,255|string',
            'name_en' => 'required|between:3,255|string',
            'price' => 'required|numeric|between:0.5,99999999,99',
            'quantity' => 'nullable|integer|between:1,9999',
            'code' => 'required|digits:5|unique:products,code,'.$id ,
            'status' => 'nullable|integer|between:0,1',
            'des_ar' => 'required|string',
            'des_en' => 'required|string',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'image' => 'nullable |mimes:png,jpg,jpeg|max:2048'
    
        ]);
    
        if ($validator->fails()) {
            return $this->apiRes(null,$validator->errors(),400);
        }
        $product=Product::find($id);
        if(!$product){
            return $this->apiRes(null," product not found",404);
        }
        $product->update($request->all());
       return  $product? $this->apiRes(new productResource($product),"product updated ",201):$this->apiRes(null,"not updated",400);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        if(!$product){
            return $this->apiRes(null," product not found",404);
        }
        $product->delete();
       return $this->apiRes(null,"deleted",201);


    }
}
