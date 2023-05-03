@extends('frontend.layouts.app')


@section('content')
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
                var pro_id = $("span.pro_id").text();
                var pro_img = $("img.pro_img").attr('src');
                var pro_price = $("span.pro_price").text();
                var pro_name = $("h2.pro_name").text();
                var pro_status = $("input.pro_status").attr('value');
                // alert(pro_id);
                // alert(pro_img);

                // alert(pro_name);
                // alert(pro_price);
                // alert(pro_status);


                $.ajax({
                type:'POST',
                url:"/user/ajax_add-to-cart",
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
{{-- <div class="col-sm-9 padding-right"> --}}
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img class="pro_img" src="{{asset('upload/product/w329--'.$getArrImage[0])}}" alt="" />
                <a href="{{asset('upload/product/'.$getArrImage[0])}}" rel="prettyPhoto"><h3>ZOOM</h3></a>

            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                        @foreach($getArrImage as $item)
                          <a href="#"><img width="85px" height="84px" src="{{asset('upload/product/'.$item)}}" id="{{ $item }}" alt=""></a>
                        @endforeach
                        </div>
                        <div class="item">
                        @foreach($getArrImage as $item)
                          <a href="#"><img width="85px" height="84px" src="{{asset('upload/product/'.$item)}}" id="{{ $item }}" alt=""></a>
                        @endforeach

                        </div>
                        <div class="item">
                        @foreach($getArrImage as $item)
                          <a href="#"><img width="85px" height="84px" src="{{asset('upload/product/'.$item)}}" id="{{ $item }}" alt=""></a>
                        @endforeach

                        </div>

                    </div>

                  <!-- Controls -->
                  <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
                <input type="hidden" name="pro_status" class="pro_status" value="{{$product['status']}}" >
                <h2 class="pro_name">{{$product['name']}}</h2>
                <p">Product ID: <span  class="pro_id" id="{{ $product['_id'] }}">{{$product['_id']}}</span></p>
                <!-- <img src="images/product-details/rating.png" alt="" /> -->
                <span>

                    <span>$<span class="pro_price">{{$product['price']}}</span></span>
                    <!-- <label>Quantity:</label> -->
                    <!-- <input type="text" value="1" /> -->
                    <!-- <button type="button" class="btn btn-fefault cart"> -->
                    <a  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    <!-- </button> -->
                </span>
                <!-- <p><b>Availability:</b> In Stock</p> -->
                <p><b>Condition:</b> New</p>
                <p><b>Category:</b>{{$product['category']}}</p>
                <p><b>Brand:</b>{{$product['brand']}}</p>

                <p>{{$product['detail']}}</p>
                <!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
		    $("a[rel^='prettyPhoto']").prettyPhoto();
		});
    </script>
    <script>
            $(document).ready(function(){
                $("div.item a").click(function(){
                    var img = $(this).find("img").attr("src");
                    $("div.view-product").find("img").attr("src",img);
                    $("div.view-product").find("a").attr("href",img);
                })
            })
        </script>
{{-- </div> --}}
@endsection
