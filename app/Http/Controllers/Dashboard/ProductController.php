<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Traits\Files;

class ProductController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select using query builder
        $products = DB::table('products')->select()->get();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subCategories = DB::table('sub_categories')->select('id', 'sub_cat_name')->get();
        $brands = DB::table('brands')->select('id', 'brand_name')->get();
        return view('dashboard.products.create', compact('subCategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //validation 
       
        $validated = $request->validated( );

        // insert at database 
        // upload image 
        $fileName= Files::uploadFile($request->file('image'),'assets/images/products');
        $validated['image'] = $fileName;
        // insert at database
        DB::table('products')->insert($validated);
        // redirect with success message 
        return redirect()->back()->with('success', 'Operation Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategories = DB::table('sub_categories')->select('id', 'sub_cat_name')->get();
        $brands = DB::table('brands')->select('id', 'brand_name')->get();
        $product = DB::table('products')->where('id', $id)->first();
        return view('dashboard.products.edit', compact('product','brands','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
         //validation 
         $validated = $request->validated( );

         $product=DB::table('products')->where('id',$id)->first();
         $oldFile=$product->image;
         //check if upload new image
         if($request->has('image')){
            //upload image
            $newFileName=Files::uploadFile($request->file('image'),'assets/images/products');
            // remove old image
            $Path="assets/images/products/{$oldFile}";
            $deletedFile=Files::DeleteFile($Path);
            if($deletedFile){

                $validated['image']=$newFileName ;

            }

            
         }

         else{
            $validated['image']=$oldFile;
         }
       
         // insert at database 
        
         DB::table('products')->where('id',$id)->update($validated);
 
         // redirect with success message 
         return redirect('dashboard/products')->with('success', 'Operation Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
          // remove old image
          $oldFile=$product->image;
          $Path="assets/images/products/{$oldFile}";
            $deletedFile=Files::DeleteFile($Path);
            if($deletedFile){

                DB::table('products')->where('id', $id)->delete();
                return redirect()->back()->with('success', 'Operation Successfully');
            }

    





    }

    public function statusToggle(Request $request,string $id){

        $status=$request->has('status')? 1: 0;
         $data['status']=$status;
         DB::table('products')->where('id',$id)->update($data);
         return redirect()->back()->with('success', 'Operation Successfully');



    }

    public function validationMessage()
    {


        return $messages = [
            'name_ar.required' => 'Product name is required ',
            'name_ar.between ' => 'Product name must be between 3 and 255 characters.',
            'name_ar.string ' => 'Product name must not be numbers',
            'name_en.required' => 'Product name is required ',
            'name_en.between ' => 'Product name must be between 3 and 255 characters.',
            'name_en.string ' => 'Product name must not be numbers',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be number.',
            'price.between' => 'The price must be between 0.5 and 99999999.',
            'quantity.between' => 'The quantity must be between 1 and 9999.',
            'quantity.integer' => 'The quantity must be integer number.',
            'code.required' => 'The code is required.',
            'code.unique' => 'The code must be unique.',
            'code.digits' => 'The code must be 5 digit.',
            'status.between' => 'The status must be 0 or 1.',
            'status.integer' => 'status must be integer number.',
            'des_ar.required' => 'Product description is required ',
            'des_ar.string ' => 'Product description must not be numbers',
            'des_en.required' => 'Product description is required ',
            'des_en.string ' => 'Product description must not be numbers',
            'sub_category_id.required' => 'select Sub Category',
            'sub_category_id.integer' => 'Sub Category id must be integer',
            'sub_category_id.exists' => 'Sub Category id must exists in  the table',
            'brand_id.required' => 'select Sub brand',
            'brand_id.integer' => 'brand id must be integer',
            'brand_id.exists' => 'brand id must exists in the table',
            'image.required' => 'select image',
            'image.mimes' => ' image extension must be png ,jpg or jpeg',
            'image.max' => ' image max size is 2GB',
           


        ];
    }
}
