<div class="col-sm-3 hide_left">
    <div class="left-sidebar">

        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            <?php
            use App\models\Category;
            $cate = Category::all()->toArray();
            ?>
            <?php foreach ($cate as $key => $value) { ?>
                <a href="asd">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  href="/user/cate/{{$value['_id']}}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{$value['name']}}
                            </a>
                        </h4>
                    </div>
                </a>

            <?php } ?>

        </div>
        <!--/category-products-->

        <!-- <div class="brands_products"> -->
        <!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <?php
            use App\models\Brand;
            $brand = Brand::all()->toArray();
            ?>
            <?php foreach ($brand as $key => $value) { ?>
                <div class="panel-heading">

                    <h4 class="panel-title">
                    <a  href="/user/brand/{{$value['_id']}}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{$value['name']}}
                            </a>
                    </h4>
                </div>
            <?php } ?>

        </div>
        <!-- </div> -->
        <!--/brands_products-->

        <div class="price-range">
            <!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div>
        <!--/price-range-->



    </div>
</div>
