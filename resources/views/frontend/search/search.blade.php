
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
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" method="POST" >
                        @csrf
                        <div class="col-sm-3">
                            <input type="text" name="name" value="" placeholder="Name">
                        </div>
                        <div class="col-sm-2">

                        <select name="price">
                                <option>Choose price</option>
                                <option value="300">duoi 300</option>
                                <option value="300-500">300-500</option>
                                <option value="500-700">500-700</option>
                                <option value="700">tren 700</option>
                                
                            </select>
                        </div> 
                        <div class="col-sm-2">

                            <select name="category">
                            <option>Category</option>

                                @foreach($categories as $key=>$value)
                                <option value="{{$value['_id']}}">{{$value['name']}}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">

                            <select name="brand">
                            <option>Brand</option>

                                @foreach($brands as $key=>$value)
                                <option value="{{$value['_id']}}">{{$value['name']}}</option> 
                                @endforeach
                            </select>


                        </div>
                        
                        <div class="col-sm-2">

                        <select name="status">
                                <option>Status</option>
                                <option value="0">New</option>
                                <option value="1">Sale</option> 
                            </select>
                        </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Search</button>

            </form>

        </div>
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
<script>
        $(document).ready(function(){
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var total_item = $("span.total_item").text();
            
            $("a.add-to-cart").click(function(e){
                total_item++;
                
                $("span.total_item").text(total_item);
                var pro_id =$(this).closest("div.single-products").attr("id");
                var pro_img = $(this).closest("div.single-products").find("img.pro_img").attr('src');
                var pro_price = $(this).closest("div.single-products").find("span.pro_price").text();
                var pro_name = $(this).closest("div.single-products").find("p.pro_name").text();
                
                // alert(pro_name);
                // alert(price);
                // alert(pro_img);
                
                $.ajax({
                type:'POST',
                url:"ajax_add-to-cart",
                data:{pro_id:pro_id,pro_img:pro_img,pro_price:pro_price,pro_name:pro_name,total_item:total_item},
                success:function(data){
                    // $("span.total_item").text(total_item);
                    console.log(data.success);
                    // alert(data.success);
                },
                errors:function(data){
                    alert(data.success);
                }
                });
            }); 
        })
    </script>
<!--/#cart_items-->
@endsection
