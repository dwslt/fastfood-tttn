@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Users</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color:green">Admin</h4>
                    <!-- <h6 class="card-subtitle">Similar to tables, use the modifier classes .thead-light to make <code>&lt;thead&gt;</code>s appear light.</h6> -->
                </div>
                <div class="table-responsive">
                    <div class="container-fluid">
                        @if(session('success_admin'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                            {{session('success_admin')}}
                        </div>
                        @endif
                    </div>

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>

                                <th scope="col">ID</th>
                                <th scope="col">LIST</th>
                                <th scope="col">Action</th>
                                {{-- <th scope="col">Handle</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($admins as $key=>$item)
                            <tr style="color:green">
                                <th scope="row">{{$i++}}</th>
                                <td>{{$item['_id']}}</td>

                                <td>{{$item['name']}}</td>
                                <!-- <td><a href="delete_admin/{{$item['_id']}}">Delete</a> |<li class="nav-item dropdown"> -->
                                <td>     
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acction</a>
                                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                            <a class="dropdown-item" href="capquyen_admin/{{'admin'}}/{{$item['_id']}}"><i class="ti-user m-r-5 m-l-5"></i> Xoa quyen admin</a>
                                            <a class="dropdown-item" href="delete_member/{{'admin'}}/{{$item['_id']}}"><i class="ti-wallet m-r-5 m-l-5"></i> Xoa account</a>
                                        </div>
                                    </li>
                                    
                                </td>

                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row"><a href="add_admin"><button type="submit">Insert</button></a></th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            {{$admins->links()}}
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color:blue">Member</h4>
                    <!-- <h6 class="card-subtitle">Similar to tables, use the modifier classes .thead-light to make <code>&lt;thead&gt;</code>s appear light.</h6> -->
                </div>
                <div class="table-responsive">
                    <div class="container-fluid">
                        @if(session('success_member'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                            {{session('success_member')}}
                        </div>
                        @endif
                    </div>

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>

                                <th scope="col">ID</th>
                                <th scope="col">LIST</th>
                                <th scope="col">Action</th>
                                {{-- <th scope="col">Handle</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($members as $key=>$item)
                            <tr style="color:blue">
                                <th scope="row">{{$i++}}</th>
                                <td>{{$item['_id']}}</td>

                                <td>{{$item['name']}}</td>
                                <!-- <td><a href="delete_member/{{$item['_id']}}">Delete</a> | <a href="edit_member/{{$item['_id']}}">Edit</a></td> -->
                                <td>     
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acction</a>
                                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                            <a class="dropdown-item" href="capquyen_admin/{{'member'}}/{{$item['_id']}}"><i class="ti-user m-r-5 m-l-5"></i> Cap quyen admin</a>
                                            <a class="dropdown-item" href="delete_member/{{'member'}}/{{$item['_id']}}"><i class="ti-wallet m-r-5 m-l-5"></i> Xoa account</a>
                                        </div>
                                    </li>
                                    
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row"><a href="add_member"><button type="submit">Insert</button></a></th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            {{$members->links()}}

        </div>

    </div>
    <footer class="footer text-center">
        Footer
        <!-- <a href="https://wrappixel.com">WrapPixel</a>. -->
    </footer>
</div>

@endsection