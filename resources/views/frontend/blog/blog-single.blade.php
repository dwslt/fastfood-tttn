@extends('frontend.layouts.app')
@section('content')

                <div class="col-sm-12">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{$blog->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> Th 5, 2022</li>
								</ul>
								<span>
									{{-- <i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i> --}}
                                    <form action="" method="POST">
                                    <div class="rate">
                                        <div class="vote">
                                            <div class="star_1 ratings_stars" data-toggle="modal" data-target="#exampleModal"><input value="1" type="hidden"></div>
                                            <div class="star_2 ratings_stars" data-toggle="modal" data-target="#exampleModal"><input value="2" type="hidden"></div>
                                            <div class="star_3 ratings_stars" data-toggle="modal" data-target="#exampleModal"><input value="3" type="hidden"></div>
                                            <div class="star_4 ratings_stars" data-toggle="modal" data-target="#exampleModal"><input value="4" type="hidden"></div>
                                            <div class="star_5 ratings_stars" data-toggle="modal" data-target="#exampleModal"><input value="5" type="hidden"></div>
                                            <span class="rate-np">0</span>
                                            {{-- <button name="rate" type="submit">rate</button> --}}
                                        </div>
                                    </div>
                                </form>
                                <p class="error"></p>
								</span>
							</div>
                            <p>
                                
                                {{$blog->description}}

							<p>
							<a href="">
								<img src="{{asset('upload/blog_img/'.$blog->image)}}" alt="">
							</a>
                            <!-- <textarea rows="50"> -->
                            {!!$blog->content!!}
                            <!-- editor -->
                            <!-- </textarea> -->
							<div class="pager-area">
								<ul class="pager pull-right">
									<li class="prev"><a href="{{$prev}}">Pre</a></li>
									<li class="nextb"><a href="{{$next}}">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
                                <?php
                                $total=5;
                                    if($average>0){
                                        for($i=1;$i<=$average;$i++){
                                            echo '<i class="fa fa-star color"></i>';
                                        }
                                    }
                                    $no = $total-$average;
                                    if($no>0){
                                        for($i=1;$i<=$no;$i++){
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                    }
                                ?>
							</li>
							<li class="color votes">(0 votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="{{asset('frontend/images/blog/socials.png')}}" alt=""></a>
					</div><!--/socials-share-->

					{{-- <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="{{asset('frontend/images/blog/man-one.jpg')}}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
					<div class="response-area">
						{{-- <h2>3 RESPONSES</h2> --}}
						<ul class="media-list">
							{{-- <li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="{{asset('frontend/images/blog/man-two.jpg')}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> Th 5, 2022</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> --}}
							{{-- <li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="{{asset('frontend/images/blog/man-three.jpg')}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> Th 5, 2022</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> --}}
                            <?php  ?>
                            <?php
                            //cach 1
                                $f = 0;
                                for($i=0;$i<count($comment);$i++){
                                    // echo
                                    if($f==count($comment)){
                                        break;
                                    }
                                    echo "
                                    <li class='media cmt' id='".$comment[$i]['_id']."''>
                                        <a class='pull-left' href='#'>
                                            <img class='media-object' src='".asset('upload/user/avatar/'.$comment[$i]['avatar'])."' width='121px' height='86px' alt=''>
								        </a>
                                        <div class='media-body'>
                                            <ul class='sinlge-post-meta'>
                                                <li><i class='fa fa-user'></i>".$comment[$i]['name']."</li>
                                                <li><i class='fa fa-clock-o'></i> 1:33 pm</li>
                                                <li><i class='fa fa-calendar'></i> ".$comment[$i]['created_at']."</li>
                                            </ul>
		    							<p>".$comment[$i]['content']."</p>
									    <a class='btn btn-primary rep_cmt' href='#text_rep'><i class='fa fa-reply'></i>Replay</a>
								        </div>
                                    </li>
                                        ";
                                    $f++;
                                    for($j=$i+1;$j<count($comment);$j++){
                                        if($comment[$i]['_id']==$comment[$j]['level']){
                                            echo "
                                    <li class='media second-media cmt' id='".$comment[$j]['_id']."''>
                                        <a class='pull-left' href='#'>
                                            <img class='media-object' src='".asset('upload/user/avatar/'.$comment[$j]['avatar'])."' width='121px' height='86px' alt=''>
								        </a>
                                        <div class='media-body'>
                                            <ul class='sinlge-post-meta'>
                                                <li><i class='fa fa-user'></i>".$comment[$j]['name']."</li>
                                                <li><i class='fa fa-clock-o'></i> 1:33 pm</li>
                                                <li><i class='fa fa-calendar'></i> DEC 5, 2022</li>
                                            </ul>
		    							<p>".$comment[$j]['content']."</p>
									    {{-- <a class='btn btn-primary rep_cmt' href='#text_rep'><i class='fa fa-reply'></i>Replay</a> --}}
								        </div>
                                    </li>
                                        ";
                                            $f++;
                                            // unset($comment[$i]);
                                        }
                                    }
                                }
                                // cach 2
                                // $check = array();
                                // for($i=0;$i<count($comment);$i++){
                                //     echo "<script>
                                //                 var rep = '';
                                //                 var rep2 ='';
                                //         </script>";
                                //     if(!in_array($comment[$i]['id'],$check)){
                                //         // echo "<p class='cmt1' id ='".$comment[$i]['id']."'>".$comment[$i]['id']." ".$comment[$i]['level']."</p>"."<br>";
                                //         echo "
                                //             <li class='media cmt' id ='".$comment[$i]['id']."'>
                                //                 <a class='pull-left' href='#'>
                                //                     <img class='media-object' src='".asset('user_img/'.$comment[$i]['avatar'])."' width='121px' height='86px' alt=''>
                                //                 </a>
                                //                 <div class='media-body'>
                                //                     <ul class='sinlge-post-meta'>
                                //                         <li><i class='fa fa-user'></i>".$comment[$i]['name']."</li>
                                //                         <li><i class='fa fa-clock-o'></i> 1:33 pm</li>
                                //                         <li><i class='fa fa-calendar'></i> DEC 5, 2013</li>
                                //                     </ul>
                                //                 <p>".$comment[$i]['content']."</p>
                                //                 <a class='btn btn-primary rep_cmt' href='#text_rep'><i class='fa fa-reply'></i>Replay</a>
                                //                 </div>
                                //             </li>
                                //         ";
                                //         // array_push($check,$comment[$i]['id']);
                                //         // echo(in_array($comment[$i]['id'],$check));
                                //     }
                                //     for($j=$i+1;$j<count($comment);$j++){
                                //         if($comment[$i]['id']==$comment[$j]['level']){
                                //             echo "
                                //                 <script>
                                //                     $(document).ready(function(){
                                //                         rep+='"."<p class="."cmt1"." id=".$comment[$j]['id'].">".$comment[$j]['id']." ".$comment[$j]['level']."</p>"."'
                                //                         rep2+='<li class=".'"media second-media"'." id = ".$comment[$j]['id'].">'+
                                //                             '<a class="."pull-left"." href="."#".">'+
                                //                                 '<img width="."121px"." height=".'86px'." class="."media-object"." src=".asset('user_img/'.$comment[$i]['avatar'])." alt=>'+
                                //                             '</a>'+
                                //                             '<div class="."media-body".">'+
                                //                                 '<ul class="."sinlge-post-meta".">'+
                                //                                     '<li><i class=".'"fa fa-user"'."></i>".$comment[$i]['name']."</li>'+
                                //                                     '<li><i class=".'"fa fa-clock-o"'."></i> 1:33 pm</li>'+
                                //                                     '<li><i class=".'"fa fa-calendar"'."></i> DEC 5, 2013</li>'+
                                //                                 '</ul>'+
                                //                                 '<p>".$comment[$i]['content']."</p>'+
                                //                                 '<a class=".'"btn btn-primary"'." href=><i class=".'"fa fa-reply"'."></i>Replay</a>'+
                                //                             '</div>'+
                                //                             '</li>';
                                //                     })
                                //                 </script>
                                //            ";
                                //            array_push($check,$comment[$j]['id']);
                                //         }
                                //     }
                                //     echo "
                                //         <script>
                                //             $(document).ready(function(){
                                //                 var id='".$comment[$i]['id']."';
                                //                 //$('p#".$comment[$i]['id']."').after(rep);
                                //                 $('li#".$comment[$i]['id']."').after(rep2);
                                //                 rep2='';
                                //                 rep = '';
                                //             })
                                //         </script>
                                //     ";
                                // }
                            ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thong bao</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Danh gia thanh cong
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">dong</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        // alert($('li.cmt').attr('id'));
    })
</script>
						</ul>
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
                                    <form action="/user/comment/{{$id}}" method="POST" class="comment" id="">
                                        @csrf
                                        <textarea name="message" class="message" rows="5" id="text_rep"></textarea>
                                        {{-- <a class="btn btn-primary" href="">post comment</a> --}}
                                        <input type="hidden" class="rep_cmt" name="rep_cmt" value="">
                                        <button class="post_cmt" type="submit">dang</button>
                                    </form>
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
					</div><!--/Repaly Box-->
				</div>

                <script>
                    $(document).ready(function(){
                        $("a.rep_cmt").click(function(){
                            var cmt_id = $(this).closest("li.cmt").attr('id');
                            // alert(cmt_id);
                            $('form.comment').find('input.rep_cmt').attr('value',cmt_id);
                            $("form.comment").attr('action','/user/rep_comment/{{$id}}');
                        })
                        $("li.votes").text("({{$vote}}) votes")
                        $("span.rate-np").text("{{$average}}")
                        var max_next =  '{{$max_next}}';
                        var id = '{{$id}}';
                        if(max_next==id){
                            $('li.nextb').hide();
                        }
                        var min_prev =  '{{$min_prev}}';
                        if(min_prev==id){
                            $('li.prev').hide();
                        }
                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                         });
                            $('.ratings_stars').hover(
                                // Handles the mouseover
                                function() {
                                    $(this).prevAll().andSelf().addClass('ratings_hover');
                                    // $(this).nextAll().removeClass('ratings_vote');
                                },
                                function() {
                                    $(this).prevAll().andSelf().removeClass('ratings_hover');
                                    // set_votes($(this).parent());
                                }
                            );
                            // $("a.btn-primary").click(function(e){
                                $("button.post_cmt").click(function(e){
                                var check = "{{Auth::check()}}";
                                // alert(check);
                                if(check){
                                    var content = $(this).prev().val();
                                    var blog_id = "{{$id}}";
                                    var user_id = "{{Auth::id()}}";
                                }else{
                                    alert('ban chua login');
                                e.preventDefault();
                                }
                                // alert(content);
                            });
                            var votes = "{{$vote}}";
                            $('.ratings_stars').click(function(e){
                                var Values =  $(this).find("input").val();
                                $("span.rate-np").text(Values);
                                votes++;
                                // alert(Values);
                                if ($(this).hasClass('ratings_over')) {
                                    $('.ratings_stars').removeClass('ratings_over');
                                    $(this).prevAll().andSelf().addClass('ratings_over');
                                } else {
                                    $(this).prevAll().andSelf().addClass('ratings_over');
                                }
                                var blog_id = "{{$id}}";
                                // alert(blog_id);
                                var check = "<?php echo(Auth::check()) ?>";
                                if(check==1){
                                // alert(check);
                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('blog-single.post') }}",
                                    data:{Values:Values,blog_id:blog_id},
                                    success:function(data){
                                        // alert(data.success);
                                    $("li.votes").text("("+ votes+") votes")
                                        console.log(data.success);
                                        // $("li.votes").text("("+data.vote+") votes");
                                    },
                                    errors: function(data){
                                        alert(data.blog_id);
                                        }
                                    });
                                }else{
                                    $("p.error").text("Login de danh gia");
                                }
                            });
                            // <form action="" method="POST">
                            //     <textarea name="message" rows="5"></textarea>
                            //     <a class="btn btn-primary" href="">post comment</a>
                            // </form>
                    });
                </script>

                @endsection

