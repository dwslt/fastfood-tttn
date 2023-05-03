<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DOANNHANH</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontendimages/ico/apple-touch-icon-57-precomposed.png')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('frontend/rate/css/rate.css')}}">
    <script>
   CKEDITOR.replace( 'detail', {
        filebrowserBrowseUrl: '{{ asset("ckfinder/ckfinder.html") }}',
        filebrowserImageBrowseUrl: '{{ asset("ckfinder/ckfinder.html?type=Images") }}',
        filebrowserFlashBrowseUrl: '{{ asset("ckfinder/ckfinder.html?type=Flash") }}',
        filebrowserUploadUrl: '{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
        filebrowserImageUploadUrl: '{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}',
        filebrowserFlashUploadUrl: '{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash") }}'
    } );
</script>
</head><!--/head-->


<body>

    @include('frontend/layouts.header')
    {{-- @include('frontend/layouts.slide') --}}

    <section>
		<div class="container">
			<div class="row">
                {{-- @include('frontend.layouts.menu-left') --}}
                <?php
                    $get_url = url()->current();
                    $url = explode('/',$get_url);
                    $account = in_array('account',$url);
                    $my_product = in_array('my_product',$url);
                    $add_product = in_array('add_product',$url);
                    $cart = in_array('cart',$url);
                    $checkout = in_array('checkout',$url);
                    if($account||$my_product||$add_product||$cart||$checkout){
                        ?>
                             @include('frontend.layouts.menu-account')
                        <?php
                    }else if($cart||$checkout){
                    }
                    else{
                        ?>
                            @include('frontend.layouts.menu-left')
                        <?php
                    }
                ?>



                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
		</div>
	</section>

    @include('frontend/layouts.footer')

    <script src="{{ asset('frontend/js/jquery.js')}}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('frontend/js/price-range.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>


</body>
</html>
