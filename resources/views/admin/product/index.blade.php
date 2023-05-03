@extends('admin.layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Product</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-9">
    <div class="table-responsive cart_info">
        
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="id">ID</td>
                    <td class="name">Name</td>
                    <td class="image">Image</td>
                    <td class="price">Price</td>
                    <td class="action">Action</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $key => $value) {
                    $getArrImage = [];
                    $getArrImage[] = json_decode($value['image'], true);
                ?>
                    <tr>
                        <td class="cart_id">
                            <p>{{$value['id']}}</p>
                        </td>
                        <td class="cart_name">
                            <p>{{$value['name']}}</p>
                        </td>
                        <td class="cart_product">
                        <a href="product_detail/{{$value['_id']}}"><img src="{{asset('upload/product/'.$getArrImage['0']['0'])}}" width="85px" alt=""></a>

                        </td>

                        <td class="cart_price">
                            <p>$<span>{{$value['price']}}</span></p>
                        </td>
                        <!-- <td class="cart_edit"> -->
                        <!-- <a class="cart_quantity_edit" href="edit_product/{{$value['id']}}"><i class="m-r-10 mdi mdi-account-edit"></i></a> -->
                        <!-- </td> -->
                        <td class="delete">
                            <a class="cart_quantity_delete" href="delete_product/{{$value['id']}}"><i class="m-r-10 mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

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
            </tbody>
        </table>
        {{$products->links()}}

    </div>
    <!-- <a class="btn btn-primary" href="add_product">Add New</a> -->
</div>
@endsection