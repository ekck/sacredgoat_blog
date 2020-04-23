<!DOCTYPE html>
<html>
<head>
<title>SACRED GOAT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GREY ERA, BLOG, LOVE, BLOGGER, GREY, ERA, BONFIRE, BEST BLOGGER, DON BENZO, DONALD BENZO " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="minsite/css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="minsite/js/move-top.js"></script>
<script type="text/javascript" src="minsite/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->
</head>
<body>
	<!--header-top-starts-->
	<div class="header-top">
		<div class="container">
			<div class="head-main">
				<a href="index.html"><img src="minsite/images/LOGZ.png" alt="" /></a>
			</div>
		</div>
	</div>
	<!--header-top-end-->
	<!--start-header-->
	<div class="header">
		<div class="container">
			<div class="head">
			<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a href="{{URL::to('/')}}"  class="active">Home</a></li>
						<li><a href="{{URL::to('About-Grey-Era')}}">About</a></li>
						<li><a href="{{URL::to('Life')}}">Life</a></li>
						<li><a href="{{URL::to('People')}}">People</a></li>
						<li><a href="{{URL::to('Growing-Up')}}">Growing Up</a></li>
						<li><a href="{{URL::to('Books')}}">Books</a></li>
						<li><a href="{{URL::to('Travel')}}">Travel</a></li>
						<li><a href="{{URL::to('Relationships')}}">Relationships</a></li>
						<li><a href="{{URL::to('Bonfire')}}">Bonfire</a></li>
					</ul>
			</div>
			<div class="header-right">
				<div class="search-bar">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
	<!-- script-for-menu -->
	<!-- script-for-menu -->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!-- script-for-menu -->
	<!--banner-starts-->
	<div class="banner">
		<div class="container">
			<div class="banner-top">
				<div class="banner-text">
					<h1>SACRED GOAT</h1>
					<h1>Reads</h1>
					<div class="banner-btn">
						<a href="{{url('Read-Blog/Read?id=') . $lastblog->id}}">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--banner-end-->
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<div class="about-one">
						<p>Find The Most</p>
						<h3>{{$lastblog->title}}</h3>
					</div>
					<div class="about-two">
						<a href="{{url('Read-Blog/Read?id=') . $lastblog->id}}"><img src="storage/gallery/{{$lastimage}}" alt="" /></a>
						<p>Posted by <a href="#">Don Benzo</a>{{$lastblog->created_at->diffForHumans()}}<a href="#">comments(2)</a></p>
						@foreach($lasttwo as $last)						
							<p>{{$last->paragraph}}</p>
						@endforeach
						<div class="about-btn">
							<a href="{{url('Read-Blog/Read?id=') . $lastblog->id}}">Read More</a>
						</div>
						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
					</div>	
					<div class="about-tre">
						<div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lastlife->blog_id}}"><img src="storage/gallery/{{$lastlifeimage}}" height="200" width="180"  alt="" /></a>
								<h6>Life</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lastlife->blog_id}}">{{$lastlifetitle}}</a></h3>
								@foreach($lastonelife as $lastl)
								<p>{{$lastl->paragraph}}</p>
								@endforeach
								<label>{{$lastlife->created_at->diffForHumans()}}</label>
							</div>
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lastpeople->blog_id}}"><img src="storage/gallery/{{$lastpeopleimage}}" height="200" width="180" alt="" /></a>
								<h6>People</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lastpeople->blog_id}}">{{$lastpeopletitle}}</a></h3>
								@foreach($lastonepeople as $lastp)
								<p>{{$lastp->paragraph}}</p>
								@endforeach
								<label>{{$lastpeople->created_at->diffForHumans()}}</label>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lastgrowing->blog_id}}"><img src="storage/gallery/{{$lastgrowingimage}}" height="200" width="180" alt="" /></a>
								<h6>Growing Up</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lastgrowing->blog_id}}">{{$lastgrowingtitle}}</a></h3>
								@foreach($lastonegrowingup as $lastg)
								<p>{{$lastg->paragraph}}</p>
								@endforeach
								<label>{{$lastgrowing->created_at->diffForHumans()}}</label>
							</div>
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lastbooks->blog_id}}"><img src="storage/gallery/{{$lastbooksimage}}" alt="" height="200" width="180" /></a>
								<h6>Books</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lastbooks->blog_id}}">{{$lastbookstitle}}</a></h3>
								@foreach($lastonebooks as $lastb)
								<p>{{$lastb->paragraph}}</p>
								@endforeach
								<label>{{$lastbooks->created_at->diffForHumans()}}</label>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lasttravels->blog_id}}"><img src="storage/gallery/{{$lasttravelsimage}}" alt="" height="200" width="180" /></a>
								<h6>Travel</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lasttravels->blog_id}}">{{$lasttravelstitle}}</a></h3>
								@foreach($lastonebooks as $lastb)
								<p>{{$lastb->paragraph}}</p>
								@endforeach
								<label>{{$lasttravels->created_at->diffForHumans()}}</label>
							</div>
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lastrelationships->blog_id}}"><img src="storage/gallery/{{$lastrelationshipsimage}}" height="200" width="180" alt="" /></a>
								<h6>Relationships</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lastrelationships->blog_id}}">{{$lastrelationshipstitle}}</a></h3>
								@foreach($lastonerelationships as $lastr)
								<p>{{$lastr->paragraph}}</p>
								@endforeach
								<label>{{$lastrelationships->created_at->diffForHumans()}}</label>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="{{url('Read-Blog/Read?id=') . $lastbonfire->blog_id}}"><img src="storage/gallery/{{$lastbonfireimage}}" height="200" width="180"  alt="" /></a>
								<h6>Bonfire</h6>
								<h3><a href="{{url('Read-Blog/Read?id=') . $lastbonfire->blog_id}}">{{$lastbonfiretitle}}</a></h3>
								@foreach($lastonebonfire as $lastbon)
								<p>{{$lastbon->paragraph}}</p>
								@endforeach
								<label>{{$lastbonfire->created_at->diffForHumans()}}</label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>	
				</div>
				<div class="col-md-4 about-right heading">
					<div class="abt-1">
						<h3>ABOUT SACRED GOAT</h3>
						<div class="abt-one">
							<img src="minsite/images/c-2.jpg" alt="" />
							<p>Quisque non tellus vitae mauris luctus aliquam sit amet id velit. Mauris ut dapibus nulla, a dictum neque.</p>
							<!-- <div class="a-btn">
								<a href="{{url('Read-Blog/Read?id=') . $lastlife->id}}">Read More</a>
							</div> -->
						</div>
					</div>
					<div class="abt-2">
						<h3>Other Interesting Stories</h3>
						@foreach($archives as $archive)
						<div class="might-grid">
								<div class="grid-might">
									<a href="{{url('Read-Blog/Read?id=') . $archive->id}}"><img src="storage/gallery/{{App\Gallery::where('blog_id','=',$archive->id)->first()->image}}" class="img-responsive" alt=""> </a>
								</div>
								<div class="might-top">
									<h4><a href="{{url('Read-Blog/Read?id=') . $archive->id}}">{{$archive->title}}</a></h4>
									<p>{{mb_substr(App\Paragraph::where('blog_id','=',$archive->id)->first()->paragraph, 0, 60)}} ...</p> 
								</div>
								<div class="clearfix"></div>
							</div>	
						@endforeach					
					</div>
					<div class="abt-2">
						<h3>More Reads</h3>
						<ul>
							@foreach($archives as $archive)
							<li><a href="{{url('Read-Blog/Read?id=') . $archive->id}}">{{$archive->title}}</a></li>
							@endforeach
						</ul>	
					</div>
					<div class="abt-2">
						<h3>NEWS LETTER</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
	<!--about-end-->
	<!--slide-starts-->
	<!--slide-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-text">
				<p>© 2018 SACRED GOAT. All Rights Reserved | Design by  <a href="https://www.linkedin.com/in/ngugi-waithima-4242b8129/" target="_blank">Ngugi Waithima</a> </p>
			</div>
		</div>
	</div>
	<!--footer-end-->
</body>
</html>