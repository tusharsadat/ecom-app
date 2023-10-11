@extends('client_template.layouts.template');
@section('contain')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">{{ $categories->category_name }}-({{ $categories->product_count }})</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach ($product_info as $product)
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
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
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
@endsection
