<!DOCTYPE html>
<html>
<head>
<title>SACRED GOAT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GREY ERA, BLOG, LOVE, BLOGGER, GREY, ERA, BONFIRE, BEST BLOGGER, DON BENZO, DONALD BENZO " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{URL::to('css/bootstrap.css')}} " rel='stylesheet' type='text/css' />
<link href="{{URL::to('minsite/css/style.css')}} " rel='stylesheet' type='text/css' />
<script src=" {{URL::to('js/jquery.min.js')}}"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src=" {{URL::to('minsite/js/move-top.js')}} "></script>
<script type="text/javascript" src=" {{URL::to('minsite/js/easing.js')}}"></script>
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
				<a href="index.html"><img src="{{url('minsite/images/LOGZ.png')}}" alt="" /></a>
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
						<li><a href="{{URL::to('Bonfire')}}">Bonfire</a></li>					</ul>
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
		
		@section('body')
		@show



	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-text">
				<p>© 2018 GREY ERA. All Rights Reserved | Design by  <a href="https://www.linkedin.com/in/ngugi-waithima-4242b8129/" target="_blank">Ngugi Waithima</a> </p>
			</div>
		</div>
	</div>
	<!--footer-end-->
</body>
</html>