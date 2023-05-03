@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">Table Header</h4> -->
                    <h4 class="card-subtitle">History.</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">

                            <tr>
                                <th scope="col">#</th>
                                <!-- <th scope="col">Email</th> -->
                                <th scope="col">Image</th>

                                <th scope="col">Name</th>
                                <!-- <th scope="col">id_user</th> -->


                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <!-- <th scope="col">Phone</th> -->
                                <!-- <th scope="col">Day</th> -->

                                <th scope="col">Time</th>

                                <!-- <th scope="col" colspan="3">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($carts as $item)
                            <tr>

                                <th scope="row">{{$item['id_product']}}</th>
                                <td><img width="85px" height="86px" src="{{$item['image']}}" alt=""></td>
                                <td>{{$item['name']}}</td>

                                <!-- <td>{{$item['id_user']}}</td> -->

                                <td>{{$item['qty']}}</td>
                                <td>{{$item['price']}}</td>
                                <td><a href="history/{{$item['id_user']}}">{{$item['created_at']}}</a></td>

                                <!-- <td>
                                    <select name="" id="">
                                        <option value="">da xu li</option>
                                    </select>
                                </td> -->
                            </tr>
                            <tr>
                            @endforeach

                                <!-- <th scope="row"><a href="add_blog">Add blog</a></th> -->
                            </tr>
                        </tbody>
                    </table>
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
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        {{session('success')}}
                    </div>
                @endif
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection
