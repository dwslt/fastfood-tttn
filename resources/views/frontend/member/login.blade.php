@extends('frontend.layouts.app')

@section('content')



				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="" method="POST">
                            @csrf
							<input name="email" type="email" placeholder="Email Address" />
                            <input name="password" type="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
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
						</form>
					</div><!--/login form-->
				</div>
@endsection