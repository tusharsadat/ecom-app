@extends('client_template.layouts.template');
@section('contain')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{ asset('upload/' . $product_info->product_img) }}"></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    <h4 class="shirt_text text-left">{{ $product_info->product_name }}</h4>
                    <h5 style="color: #262626;" class="price_text text-left">{{ $product_info->product_short_des }}</h5>
                    <p class="price_text text-left">Price <span style="color: #262626;">$
                            {{ $product_info->product_price }}</span></p>
                    <div class="my-3 product-details">
                        <p class="lead">{{ $product_info->product_long_des }}</p>
                        <ul class="p-2 bg-light my-2">
                            <li>Category: {{ $product_info->product_category_name }}</li>
                            <li>Sub Cagegory: {{ $product_info->product_subcategory_name }}</li>
                            <li>Available Quantity: {{ $product_info->product_count }}</li>
                        </ul>
                    </div>
                    <form action="{{ route('producttocart', $product_info->id) }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product_info->id }}" name="product_id">
                        <div class="row mb-3">
                            <label class="pl-4 col-form-label" for="basic-default-name">Add Quantity</label>
                            <div class="col-sm-3">
                                <input type="number" min="1" class="form-control" id="product_quantity"
                                    name="product_quantity" placeholder="1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-warning">Add To Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="fashion_section">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">Related Product</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    @foreach ($related_product as $product)
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box_main">
                                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                                <p class="price_text">Price <span style="color: #262626;">$
                                                        {{ $product->product_price }}</span></p>
                                                <div class="tshirt_img"><img
                                                        src="{{ asset('upload/' . $product->product_img) }}">
                                                </div>
                                                <div class="btn_main">
                                                    <div class="buy_bt">
                                                        <form action="{{ route('producttocart', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $product->id }}"
                                                                name="product_id">
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <button type="submit" class="btn btn-warning">Add To
                                                                        Cart</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="seemore_bt"><a
                                                            href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
