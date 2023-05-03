@extends('frontend.layouts.app')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			
			
			

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-5">
					<h2>New User Signup!</h2>
						<form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="username" name="name" value="" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    {{-- {{Auth::user()->email}} --}}
                                    {{-- {{$a}} --}}
                                    <input type="email" placeholder="email" name="email" value="" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="password" value="" name="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="phone" name="phone" value="" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Message</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="country">
                                        @foreach ($countries as $item)
                                            <option>{{$item['name']}}</option>
                                        @endforeach
                                        {{-- <option>London</option>
                                        <option>India</option>
                                        <option>Usa</option>
                                        <option>Canada</option>
                                        <option>Thailand</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">avatar</label>
                                <div class="col-md-12">
                                    <input type="file"  name="avatar" value="" class="form-control form-control-line">
                                </div>
                            </div>
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('success')}}
                                </div>
                             @endif

                             @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báol</h4>
                                    <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success register">Register</button>
                                </div>
                            </div>
                        </form>
					</div>
					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
					    <?php
						$total_item = 0;
						$total_price = 0;
                        if(session()->has('carts_session')){
                            $cart = session()->get('carts_session');
                            foreach($cart as $key=>$value){
							$total_price+=$value['product_qty'] * $value['product_price'];
							$total_item+=$value['product_qty'];
                            
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
												<!-- <a class="cart_quantity_up" href="#"> + </a> -->
												<p>{{$value['product_qty']}}</p>
												<!-- <input class="cart_quantity_input" type="text" name="quantity" value="{{$value['product_qty']}}" autocomplete="off" size="2"> -->
												<!-- <a class="cart_quantity_down" href="#"> - </a> -->
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">$<span class="total_price_s">{{ $value['product_qty'] * $value['product_price']}}</span></p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="#"><i class="fa fa-times"></i></a>
										</td>
									</tr>
                        <?php }} ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Item</td>
										<td><span class="total_item"><?php if(isset($total_item)){ echo $total_item;}else{ echo "0";} ?></span></td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span class="total_price"><?php if(isset($total_price)){ echo $total_price;}else {echo "0";} ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
					@if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('success')}}
                                </div>
                             @endif

                             @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báol</h4>
                                    <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
				</table>
			</div>
			<div class="payment-options">

			<?php
				$email = "";
				$name = "";
				if(Auth::check()){
					$email = Auth::user()->email;
					$name = Auth::user()->name;

				}
				
			?>

						<form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                            @csrf
							<input type="hidden" name="email" value="{{$email}}">
							<input type="hidden" name="name" value="{{$name}}">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success order">Order</button>
                                </div>
                            </div>
                        </form>
			
					<!-- <span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span> -->
				</div>
		</div>
	</section> <!--/#cart_items-->
	<?php 
	
	?>
    <script>
			
			
		var check = "<?php echo Auth::check(); ?>"
		
        $(document).ready(function(){
			$("div.shopper-informations").hide();
			
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			// $("div.shopper-informations").hide();
			
			$("button.order").click(function(e){
				if(check!=1){
					$("div.shopper-informations").show();
					e.preventDefault();
				}else{
					$("div.shopper-informations").hide();

				}
			});
			
			

        })
    </script>
    
@endsection
