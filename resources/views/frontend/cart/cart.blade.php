@extends('frontend.layouts.app')

@section('content')
<script>
	
</script>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@if(session('success'))
                     <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        {{session('success')}}
                    </div> 
                @endif
                        <?php
							if(session()->has('carts_session'))
							{ 
								$total_item = session()->get('total_item') ;
								$carts_session = session()->get('carts_session');
							
						
								$total_price=0; 
								// echo "<pre>";
								// var_dump($carts_session);
								foreach ($carts_session as $key => $value) {
									// echo $key[$value['product_name']]."<br>";
									// echo $carts_session[$key]['product_name'];
									// echo $value['product_name'];
								}
								foreach($carts_session as $key=>$value){ 
									
									$total_price += $value['product_qty']*$value['product_price'];
								?>
									<tr id="{{$value['product_id']}}" >
										<td class="cart_product">
											<a href=""><img width="110px" height="110px" src="{{$value['product_image']}}" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{$value['product_name']}}</a></h4>
											<p>Web ID: {{$value['product_id']}}</p>
										</td>
										<td class="cart_price">
											<p>$<span class="price_s">{{$value['product_price']}}</span></p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<a class="cart_quantity_up" > + </a>
												<input class="cart_quantity_input" type="text" name="quantity" value="{{$value['product_qty']}}" autocomplete="off" size="2">
												<a class="cart_quantity_down"> - </a>
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">$<span class="total_price_s">{{ $value['product_qty'] * $value['product_price']}}</span></p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
										</td>
									</tr>
									
								<?php 
								}
								if(count($carts_session)==0){
									?>
									<h1 style="color: red;">Gio hang trong</h1>
									<?php
								}
							}
							 ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div> -->
			<div class="row">
				<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<!-- <li>Cart Sub Total <span>$59</span></li> -->
							<!-- <li>Eco Tax <span>$2</span></li> -->
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<span class="total_price"><?php if(isset($total_price)){echo $total_price;} ?></span></span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							<a class="btn btn-default check_out" href="checkout">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	
    <script>
           $(document).ready(function(){
            
			$("div.hide_left").hide();
            var total_item = $("span.total_item").text();
            var total_price = parseInt($("span.total_price").text());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("a.cart_quantity_up").click(function(){
                total_item++;
                $("span.total_item").text(total_item)
                
                var qty_s = $(this).closest("tr").find("input.cart_quantity_input").val();
                qty_s++;
				$(this).closest("tr").find("input.cart_quantity_input").val(qty_s);
                var price_s = $(this).closest("tr").find('span.price_s').text();
                $(this).closest("tr").find("span.total_price_s").text(price_s*qty_s);
                
                total_price+=parseInt(price_s);
                $("span.total_price").text(total_price);
				//get id product
				var id_product = $(this).closest("tr").attr("id");
                $.ajax({
                    type:'POST',
                    url:"ajax_up_product",
                    data:{id_product:id_product},
                    success:function(data){
                        console.log(data.success);
						// alert("asd");
                            // console.log(data);
                            // $("p.asd").text(data);
                    }
                });
            });
			$("a.cart_quantity_down").click(function(){
                total_item--;
                $("span.total_item").text(total_item)
                
                var qty_s = $(this).closest("tr").find("input.cart_quantity_input").val();
                qty_s--;
				if(qty_s==0){
					$(this).closest("tr").remove();
				}
					$(this).closest("tr").find("input.cart_quantity_input").val(qty_s);
                var price_s = $(this).closest("tr").find('span.price_s').text();
                $(this).closest("tr").find("span.total_price_s").text(price_s*qty_s);
                
                total_price-=parseInt(price_s);
                $("span.total_price").text(total_price);
				//get id product
				var id_product = $(this).closest("tr").attr("id");
					
                $.ajax({
                    type:'POST',
                    url:"ajax_down_product",
                    data:{id_product:id_product},
                    success:function(data){
                        console.log(data.success);
						// alert("asd");
                            // console.log(data);
                            // $("p.asd").text(data);
                    }
                });	
            });
			$("a.cart_quantity_delete").click(function(){
				
                var qty_s = $(this).closest("tr").find("input.cart_quantity_input").val();
				total_item-=qty_s;
                $("span.total_item").text(total_item)
                
                var price_s = $(this).closest("tr").find('span.price_s').text();
                
                total_price-=parseInt(price_s*qty_s);
                $("span.total_price").text(total_price);
				
				//get id product
				var id_product = $(this).closest("tr").attr("id");
				$(this).closest("tr").remove();
                $.ajax({
                    type:'POST',
                    url:"ajax_delete_product",
                    data:{id_product:id_product,qty_s:qty_s},
                    success:function(data){
                        console.log(data.success);
						// alert("asd");
                            // console.log(data);
                            // $("p.asd").text(data);
                    }
                });	
            });
        })
    </script>
@endsection