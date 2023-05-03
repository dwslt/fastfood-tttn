@extends('frontend.layouts.app')
@section('content')




<div class="col-sm-2 col-sm-offset-1">
</div>

<div class="col-sm-8">
    <div class="signup-form"><!--sign up form-->
        <h2>User Update!</h2>
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
                    <h4><i class="icon fa fa-check"></i> Thông báol</h4>
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form class="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="col-md-12">Full Name</label>
                <div class="col-md-12">
                    <input type="text" placeholder="username" name="name" value="{{$user->name}}" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="col-md-12">Email</label>
                <div class="col-md-12">
                    {{-- {{Auth::user()->email}} --}}
                    {{-- {{$a}} --}}
                    <input type="email" placeholder="email" name="email" value="{{$user->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Password</label>
                <div class="col-md-12">
                    <input type="password" value="" name="password" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Phone No</label>
                <div class="col-md-12">
                    <input type="text" placeholder="123 456 7890" name="phone" value="{{$user->phone}}" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Address</label>
                <div class="col-md-12">
                    <textarea rows="5" class="form-control form-control-line" name="address"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12">Select Country</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-line" name="country">
                        {{-- <option>London</option>
                        <option>India</option>
                        <option>Usa</option>
                        <option>Canada</option>
                        <option>Thailand</option> --}}
                        <option>{{$user->country}}</option>
                        @foreach ($countries as $key=>$value)
                            <option>{{$countries[$key]['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">avatar</label>
                <div class="col-md-12">
                    <input type="file"  name="avatar" value="" class="form-control form-control-line">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Update Profile</button>
                </div>
            </div>

        </form>
        
    </div><!--/sign up form-->
</div>
    @endsection
