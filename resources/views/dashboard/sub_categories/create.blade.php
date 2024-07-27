@extends('layouts.parent')
@section('title','Create sub_category')

@section('content')

<div class="col-12">
    <div class="card card-primary">
        @include('includes.messages')
        <div class="card-header">
            <h3 class="card-title">Create sub_category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


        <!-- form start -->

        <form id="quickForm" method="post" action="{{route('sub_categories.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col-6">
                        <label for="sub_category_name">sub_category Name</label>
                        <input type="text" name="sub_cat_name" value="{{old('sub_cat_name')}}"
                            class="@error('sub_cat_name') is-invalid @enderror form-control" id="sub_category_name">
                        @error('sub_cat_name')
                        <div class="alert alert-danger mt-1">
                            {{$message}}
                        </div>

                        @enderror
                    </div>


                </div>


            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">Create Sub_category</button>
            </div>
        </form>
    </div>


</div>




@endsection