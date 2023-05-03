@extends('frontend.layouts.app')

@section('content')
<section id="cart_items">
    {{-- <div class="col-sm-9"> --}}
    {{-- <div class="container"> --}}
    <div class="col-sm-12">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                    <td class="stt">STT</td>

                        <td class="id">ID</td>
                        <td class="name">Name</td>
                        <td class="image">Image</td>
                        <td class="price">Price</td>
                        <td class="action" colspan="2">Action</td>
                        <td></td>
                    </tr>
                </thead>
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
                <tbody>
                    <?php
                    $i=1;
                    foreach ($products as $key => $value) {
                        $getArrImage = [];
                        $getArrImage[] = json_decode($value['image'], true);
                        // echo "<pre>";
                        // echo($getArrImage['0']['0']);
                        
                    ?>
                        <tr>
                        <td class="cart_stt">
                                <p>{{$i++}}</p>
                            </td>
                            <td class="cart_id">
                                <p>{{$value['_id']}}</p>
                            </td>
                            <td class="cart_name">
                                <p>{{$value['name']}}</p>
                            </td>

                            <td class="cart_product">
                                <a href="product_detail/{{$value['_id']}}"><img src="{{asset('upload/product/w85--'.$getArrImage['0']['0'])}}" alt=""></a>
                            </td>

                            <td class="cart_price">
                                <p>$<span>{{$value['price']}}</span></p>
                            </td>
                            <td class="cart_edit">
                                <a class="cart_quantity_edit" href="edit_product/{{$value['_id']}}"><i class="fa fa-edit"></i></a>
                            </td>
                            <td class="delete">
                                <a class="cart_quantity_delete" href="delete_product/{{$value['_id']}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                   
                </tbody>
            </table>
            <a class="btn btn-primary" href="add_product">Add New</a>

        </div>
        <div style="margin-left:40%">
        {{$products->links()}}
        </div>
    </div>
    </div>

</section>
@endsection