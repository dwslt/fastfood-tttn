@extends('frontend.layouts.app')

@section('content')
<section id="cart_items">
    <!-- <div class="container"> -->
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Search Advanced</li>
        </ol>
    </div>
    <!--/breadcrums-->


    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Features Items</h2>


        <!-- <div class="shopper-informations"> -->
        
    </div>
    @if(isset($products))
    @foreach($products as $item)
        <?php
            $getArrImage = json_decode($item['image'], true);
            // echo "<pre>";
            // var_dump($getArrImage);
        ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products" id="{{ $item['_id'] }}">
                        <div class="productinfo text-center">
                            <img class="pro_img" src="{{asset('upload/product/'.$getArrImage['0'])}}" alt="" />
                            <h2>$<span class="pro_price">{{$item['price']}}</span></h2>
                            <p class="pro_name">{{$item['name']}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>${{$item['price']}}</h2>
                                <p>{{$item['name']}}</p>
                                <a  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                </div>
                
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <!-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li> -->
                        <li><a href="product_detail/{{ $item['_id'] }}"><i class="fa fa-plus-square"></i>product detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

    @endif

    </div>
</section>
<!--/#cart_items-->


@endsection