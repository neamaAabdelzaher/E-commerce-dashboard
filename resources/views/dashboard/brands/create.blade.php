@extends('layouts.parent')
@section('title','Create Brand')

@section('content')

<div class="col-12">
    <div class="card card-primary">
        @include('includes.messages')
        <div class="card-header">
            <h3 class="card-title">Create Brand</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


        <!-- form start -->

        <form id="quickForm" method="post" action="{{route('brands.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col-6">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" name="brand_name" value="{{old('brand_name')}}"
                            class="@error('brand_name') is-invalid @enderror form-control" id="brand_name">
                        @error('brand_name')
                        <div class="alert alert-danger mt-1">
                            {{$message}}
                        </div>

                        @enderror
                    </div>


                </div>


            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">Create Brand</button>
            </div>
        </form>
    </div>


</div>




@endsection