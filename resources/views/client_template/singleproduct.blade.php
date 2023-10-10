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
                    <div class="btn btn-warning">
                        <div class="buy_bt"><a href="#">Add To Cart</a></div>
                    </div>
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
                                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
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
