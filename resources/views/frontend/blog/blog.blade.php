@extends('frontend.layouts.app')

@section('content')


                <div class="col-sm-12">


					<div class="rating-area">
						<!-- <ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul> -->
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Ipad<span>/</span></a></li>
							<li><a class="color" href="">Laptop <span>/</span></a></li>
							<li><a class="color" href="">Phone</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="{{asset('frontend/images/blog/socials.png')}}" alt=""></a>
					</div><!--/socials-share-->
                    <div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>



                    @foreach ($blogs as $item)
                    <div class="single-blog-post">
                        <h3>{{$item->title}}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> Admin</li>
                                <li><i class="fa fa-clock-o"></i> 20:00 pm</li>
                                <li><i class="fa fa-calendar"></i> Th 2, 2022</li>
                            </ul>
                            <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                            </span>
                        </div>
                        <a href="">
                            
                            <img src="{{asset('upload/blog_img/'.$item->image)}}" alt="">
                        </a>
                        <p>{{$item->description}}.</p>
                        <a href="blog-single/{{$item->_id}}" class="btn btn-primary" href="">Read More</a>
                    </div>
					{{-- <div class="media commnets">
						<a class="pull-left" href="blog-single/{{$item->_id}}">
							<img width="100px" height="100px" class="media-object" src="{{asset('blog_img/'.$item->image)}}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">{{$item->title}}</h4>
							<p>{{$item->description}}</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments--> --}}
                    @endforeach
                </div>

				</div>
                <div style="margin:10px 35%;">
                {{$blogs->links()}}
                </div>
                   

@endsection
