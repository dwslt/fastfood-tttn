@extends('frontend.layouts.app')



@section('content')
<?php
    //    session()->forget('carts_session');
    //    session()->forget('total_item');
    $cart = session()->get('carts_session');
    // echo "<pre>";
    // var_dump($cart);

    // foreach ($cart as $key => $value) {
    //     echo $cart[$key]['product_qty']."<br>";
    // }
    // session()->forget('carts_session');
    //     session()->forget('total_item');

?>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
//             $.ajax({
//     statusCode: {
//         500: function() {
//           alert("Script exhausted");
//         }
//       }
//    });

            var total_item = $("span.total_item").text();
            $("a.add-to-cart").click(function(e){
                total_item++;
                $("span.total_item").text(total_item);
                var pro_id =$(this).closest("div.single-products").attr("_id");
                var pro_img = $(this).closest("div.single-products").find("img.pro_img").attr('src');
                var pro_price = $(this).closest("div.single-products").find("span.pro_price").text();
                var pro_name = $(this).closest("div.single-products").find("p.pro_name").text()
                var pro_status = $(this).closest("div.single-products").find("input.pro_status").attr('value');
                // alert(pro_status);
                // alert(pro_name);
                // alert(pro_price);
                // alert(pro_img);
                // alert(pro_id);
                $.ajax({
                type:'POST',
                url:"ajax_add-to-cart",
                data:{pro_id:pro_id,pro_status:pro_status,pro_img:pro_img,pro_price:pro_price,pro_name:pro_name,total_item:total_item},
                success:function(data){
                    // $("span.total_item").text(total_item);
                    console.log(data.success);
                    // alert(data.success);
                },
                errors:function(data){
                    // alert(data.errors);
                    // console.log(data.success);
                    alert(data.success);

                }
                });
            });
        })
    </script>
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <div class="aaaa">

        @foreach($products as $item)
        <?php
            $getArrImage = json_decode($item['image'], true);
            // echo "<pre>";

            // var_dump($getArrImage);
        ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products" id="{{ $item['_id'] }}">
                    <input type="hidden" name="pro_status" class="pro_status" value="{{$item['status']}}" >
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
                                <a  class="btn btn-default add-to-cart" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                </div>

                <div class="choose">
                    <ul class="nav nav-pills nav-justified">

                        <li><a href="/user/product_detail/{{ $item['_id'] }}"><i class="fa fa-plus-square"></i>product detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        {{$products->links()}}

        </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thong bao</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Them vao gio hang thanh cong
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">dong</button>
      </div>
    </div>
  </div>
</div>
    </div><!--features_items-->


    </div><!--/category-tab-->


    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("div.slider-horizontal").click(function(){
                var arr_price = $(this).find("div.tooltip-inner").text();
                $.ajax({
                    type:'POST',
                    url:"ajax_search_price",
                    data:{arr_price:arr_price},
                    success:function(data){
                        console.log(data.products);
                        // alert(data.min);
                        var products = data.products;
                        var html = "";
                        newObject = products.map(function (value) {
                        var img = JSON.parse(value['image']);
                        var image = img['0'];
                        var anh = "{{ asset('upload/product/')}}";


                        html+='<div class="col-sm-4">'+
                                    '<div class="product-image-wrapper">'+
                                        '<div class="single-products" id="'+value["_id"]+'">'+
                                            '<div class="productinfo text-center">'+
                                                '<img class="pro_img" src='+anh+'/'+image+'>'+
                                                '<h2>$<span class="pro_price">'+value["price"]+'</span></h2>'+
                                                '<p class="pro_name">'+value["name"]+'</p>'+
                                                '<a href="#" class="btn btn-default add-to-cart"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart"></i>Add to cart</a>'+
                                            ' </div>'+
                                            '<div class="product-overlay">'+
                                                '<div class="overlay-content">'+
                                                    '<h2>$'+value["price"]+'</h2>'+
                                                    '<p>'+value["name"]+'</p>'+
                                                    '<a  class="btn btn-default add-to-cart"  data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-shopping-cart"></i>Add to cart</a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="choose">'+
                                            '<ul class="nav nav-pills nav-justified">'+
                                                ' <li><a href="product_detail/'+value["_id"]+'"><i class="fa fa-plus-square"></i>product detail</a></li>'+
                                            '</ul>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                            // console.log('ád');
                        });
                        $("div.aaaa").html(html);
                    }
                });
            });
        })
    </script>
@endsection
