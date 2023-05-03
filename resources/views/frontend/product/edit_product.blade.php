@extends('frontend.layouts.app')

@section('content')

<div class="col-sm-2 col-sm-offset-1">
</div>

<div class="col-sm-9">
    <div class="signup-form"><!--sign up form-->
        <h2>Update product</h2>
        <form class="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" placeholder="Name" name="name" value="{{$product['name']}}" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" placeholder="Price" name="price" value="{{$product['price']}}" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select class="form-control form-control-line" name="category">
                        <option value="{{$product_cate['_id']}}">{{$product_cate['name']}}</option>
                         @foreach ($categories as $key=>$value)
                            <option value="{{$value['_id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select class="form-control form-control-line" name="brand">
                        {{-- <option>Asus</option>
                        <option>Apple</option> --}}
                            <option value="{{$product_brand['_id']}}">{{$product_brand['name']}}</option>
                        @foreach ($brands as $key=>$value)
                        {{-- {{$value['name']}} --}}
                            <option value="{{$value['_id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <select class="form-control form-control-line on_sale" name="sale">
                        @if ($product['sale']==0){
                        <option value="0">new</option>
                        <option value="1">sale</option>

                        }
                        @else
                        <option value="1">sale</option>
                        <option value="0">new</option>


                        @endif

                        {{-- <option>{{$country}}</option>
                        @foreach ($countries as $key=>$value)
                            <option>{{$countries[$key]['name']}}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="form-group sale_pt">
                <div class="col-md-4">
                    <input type="text" placeholder="0" value="{{$product['sale']}}" name="number_sale"  class="form-control form-control-line">
                </div>
                <div class="col-md-1">
                    %
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" placeholder="Company profile" value="{{$product['company']}}" name="company"   class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="file" multiple name="image[]"  class="form-control form-control-line">
                </div>
                <?php $a=0; ?>
                @foreach ($getArrImage as $item)

                <div class="col-md-2" >

                    <img width="85px" height="84px" src="{{asset('upload/product/'.$item)}}"  alt="">
                    <input type="checkbox"  name="unimage[{{$a++}}]">
                </div>

                @endforeach
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <textarea name="detail" id="detail" cols="30" rows="10" placeholder="Detail">{{$product['detail']}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">edit product</button>
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
                        <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </form>


    </div><!--/sign up form-->
</div>
<script>
    $("div.sale_pt").hide();
    $(document).ready(function(){
        var status =  $("select.on_sale").val();
        if(status==1){
                $("div.sale_pt").show();
            }else{
                $("div.sale_pt").hide();
            }
        $("select.on_sale").change(function(){
            var sale = $(this).val();
            if(sale==1){
                $("div.sale_pt").show();
            }else{
                $("div.sale_pt").hide();
            }
        });
    })
</script>
    @endsection
