@extends('admin.layouts.template');
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Product</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Product</h5>
                    <small class="text-muted float-end">Input Information</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product_info->id }}" name="id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ $product_info->product_name }}" />
                            </div>
                        </div>
                        <div class="row
                                    mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Short Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_short_des" name="product_short_des">{{ $product_info->product_short_des }}</textarea>
                            </div>
                        </div>
                        <div class="row
                                        mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" cols="30" rows="10" id="product_long_des" name="product_long_des">{{ $product_info->product_long_des }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_count" name="product_count"
                                    value="{{ $product_info->product_count }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_price" name="product_price"
                                    value="{{ $product_info->product_price }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Image</label>
                            <div class="col-sm-10">
                                <img style="height: 100px" src="{{ asset('upload/' . $product_info->product_img) }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="formFile">Product Image</label>
                            <div class="col-sm-10">

                                <input class="form-control" type="file" id="product_img" name="product_img" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
