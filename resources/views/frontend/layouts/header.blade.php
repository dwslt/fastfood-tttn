<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +84 404 404</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> 404doannhanh@ued.vn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">

                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">

                            <!-- <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li> -->
                            <li><a href="checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="/user/cart"><i class="fa fa-shopping-cart"></i> Cart (<span style="color: red;" class="total_item"><?php  ?></span>)</a></li>

                            <?php
                                if(Auth::check()){
                                    echo '<li class="account"><a href="/user/account"><i class="fa fa-user"></i> Account</a></li>
                                          <li class="logout"><a href="/user/logout"><i class="fa fa-star"></i> logout</a></li>';
                                }else{
                                    echo '<li class="register"><a href="/user/register"><i class="fa fa-lock"></i> register</a></li>
                                          <li class="login"><a href="/user/login"><i class="fa fa-lock"></i> Login</a></li>';
                                }
                            ?>

                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/user/" class="active">Home</a></li>
                            <!-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop">Products</a></li>
                                    <li><a href="product-details">Product Details</a></li>
                                    <li><a href="checkout">Checkout</a></li>
                                    <li><a href="cart">Cart</a></li>
                                    <li><a href="login">Login</a></li>
                                </ul>
                            </li> -->
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/user/blog">Blog List</a></li>
                                    {{-- <li><a href="blog-single">Blog Single</a></li> --}}
                                </ul>
                            </li>
                            <!-- <li><a href="404">404</a></li> -->
                            <li><a href="contact-us">Contact</a></li>
                            <li><a href="/user/search">Search Advanced</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="search_name" method="post">
                        @csrf
                        <div class="search_box ">
                            <input type="text" name="name" placeholder="Search"/>
                        </div>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
<?php
    if(session()->has('total_item'))
    {
     $total_item = session()->get('total_item') ;
} ?>
<script>
     var total = "<?php if(isset($total_item)){echo $total_item;} ?>"
            $("span.total_item").text(total);
</script>
