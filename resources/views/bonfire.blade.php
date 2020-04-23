@extends('layouts.homepage')

@section('body')

<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="col-md-10 about-left">
				<h2 align="center">Bonfire</h2><br>
				@foreach($stories as $story)
				<div class="col-md-4 abt-left">
					<a href="{{url('Read-Blog/Read?id=') . $story->bid}}"><img src="storage/gallery/{{$story->image}}" height="200" width="180"  alt="" /></a>
					<h6>Bonfire</h6>
					<h3><a href="{{url('Read-Blog/Read?id=') . $story->bid}}">{{$story->title}}</a></h3>
					{{App\Paragraph::where('blog_id','=',$story->bid)->first()->paragraph}}

					<label>{{Carbon\Carbon::parse($story->created_at)->diffForHumans()}}</label>
				</div>
				@endforeach		

			</div>

			<div class="col-md-2 about-right heading">
				<h3>YOU MIGHT ALSO LIKE</h3>
				<div class="abt-2">
					<ul>
						@foreach($archives as $archive)
						<li><a href="{{url('Read-Blog/Read?id=') . $archive->bid}}">{{$archive->title}}</a></li>
						@endforeach
					</ul>	
				</div>
			</div>
		</div>
	</div>
</div>

@endsection