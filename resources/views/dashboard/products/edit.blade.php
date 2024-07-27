@extends('layouts.parent')
@section('title','Edit Product')

@section('content')

<div class="col-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title ">Edit Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


        <!-- form start -->
       
        <form id="quickForm" method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-row">
                    <div class="col-6">
                        <label for="name_ar">Arabic Name</label>
                        <input type="text" name="name_ar" value="{{$product->name_ar}}" class="@error('name_ar') is-invalid @enderror form-control" id="name_ar">
                    @error('name_ar')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>
                    <div class="col-6">
                        <label for="name_en">English Name</label>
                        <input type="text" name="name_en"  value="{{$product->name_en}}" class=" @error('name_en') is-invalid @enderror form-control" id="name_en">
                        @error('name_en')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>

                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="code">Code</label>
                        <input type="text" name="code"  value="{{$product->code}}" class="@error('code') is-invalid @enderror form-control" id="code">
                        @error('code')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>
                    <div class="col-4">
                        <label for="price">Price</label>
                        <input type="text" name="price"  value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror" id="price">
                        @error('price')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>
                    <div class="col-4">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity"  value="{{$product->quantity}}" class="form-control @error('quantity') is-invalid @enderror" id="quantity">
                        @error('quantity')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>


                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="status">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                            <option {{$product->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$product->status == 0? 'selected': ''}} value="0">Not Active</option>
                            

                        </select>
                        @error('status')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>
                    <div class="col-4">
                        <label for="brands">Brands</label>
                        <select name="brand_id"  class="form-control @error('brand_id') is-invalid @enderror" id="brands">
                            <option disabled selected > Select Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected':''  }}> {{$brand->brand_name}} </option>
                            @endforeach

                        </select>
                        @error('brand_id')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>
                    <div class="col-4">
                        <label for="sub_cat">Sub Categories</label>
                        <select name="sub_category_id"  value="{{old('sub_category_id')}}" class="form-control @error('sub_category_id') is-invalid @enderror" id="sub_cat">
                        <option disabled selected > Select subCategory</option>
                            @foreach($subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" {{ $subCategory->id == $product->sub_category_id ? 'selected':''  }}> {{$subCategory->sub_cat_name}}</option>
                            @endforeach
                        </select>
                        @error('sub_category_id')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <label for="des_ar">Arabic Description</label>
                            <textarea cols="50" rows="10" name="des_ar" class="form-control @error('des_ar') is-invalid @enderror" id="des_ar">
                            {{$product->des_ar}}
                            </textarea>
                            @error('des_ar')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                        </div>
                        <div class="col-6">
                            <label for="des_en">English Description</label>
                            <textarea name="des_en" id="des_en" class="form-control @error('des_en') is-invalid @enderror" cols="50" rows="10">
                            {{$product->des_en}}
                            </textarea>
                            @error('des_en')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                        </div>

                    </div>


                    <div class="form-group mb-0">
                    <label for="customFile">Image</label>
                        <div class="custom-file col-12">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                            @error('image')
                    <div class="alert alert-danger mt-1">
                        {{$message}}
                    </div>
                    
                    @enderror
                            <label class="custom-file-label" for="customFile">choose file</label>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <img src="{{asset('assets/images/products/'.$product->image)}}" alt="{{$product->name_en}}" class="w-100">
                        </div>
                    </div>

                 
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary">Update Product</button>
                </div>
        </form>
    </div>


</div>




@endsection