@extends('admin.layouts.app');
@section('content')

             <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Country</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table Header</h4>
                                <h6 class="card-subtitle">Similar to tables, use the modifier classes .thead-light to make <code>&lt;thead&gt;</code>s appear light.</h6>
                            </div>
                            <div class="table-responsive">
                            <div class="container-fluid">
                @if(session('success'))
                     <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        {{session('success')}}
                    </div> 
                @endif
            </div>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">LIST</th>
                                            <th scope="col" colspan="2">Action</th>
                                            {{-- <th scope="col">Handle</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php $i=1; ?>
                                        @foreach ($categories as $key=>$item)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>{{$item['name']}}</td>
                                            <td><a  href="edit_cat/{{$item['_id']}}">Edit</a> | <a class="delete" href="delete_cat/{{$item['_id']}}">Delete</a></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row"><a href="add_category"><button type="submit">Insert</button></a></th>
                                        </tr>
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           


            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->

<script>
    
       $(document).ready(function(){
           $("a.delete").click(function(){
              var xx = confirm("Xac nhan xoa category ");
            
           })
       })
    
</script>
@endsection