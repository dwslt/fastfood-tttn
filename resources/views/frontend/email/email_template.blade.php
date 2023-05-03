<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Document</title>

</head>
<body>
  <?php
    
  ?>
  <div class="table-responsive cart_info">
    <h2>Name : {{$name}}</h2>
				<table class="table table-condensed" border="1px" cellspacing="0" cellpadding="10" width="400">
					<thead>
						<tr class="cart_menu">
						<td class="price">Product id </td>

            <td class="Name">Name</td>
							
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							
						</tr>
					</thead>
					<tbody>
					    <?php
                        if(session()->has('carts_session')){
                            $cart = session()->get('carts_session');
                            foreach($cart as $key=>$value){
                            
                        ?>
						<tr id="{{$value['product_id']}}" >
						<td class="cart_id">
											<h4><a href="">{{$value['product_id']}}</a></h4>

										</td>
										<td class="cart_description">
											<h4><a href="">{{$value['product_name']}}</a></h4>

										</td>
										<td class="cart_price">
											<p>$<span class="price_s">{{$value['product_price']}}</span></p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<p>{{$value['product_qty']}}</p>
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">$<span class="total_price_s">{{ $value['product_qty'] * $value['product_price']}}</span></p>
										</td>
									
									</tr>
                        <?php }} ?>

					</tbody>
				</table>

        <p>Email : {{$email}}</p>
		<p>Phone : {{$phone}}</p>
        <p>item : {{$item}}</p>
        <p>Price : {{$sum}}</p>
        
			</div>

</body>
</html>