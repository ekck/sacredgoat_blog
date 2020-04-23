@extends('layouts.homepage')

@section('body')

<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="col-md-10 about-left">
				<h3>{{$blog->title}}</h3>
					@if(session('message'))
		               <div class="alert alert-success">
		                    {{ session('message') }}
		               </div>
					@endif			
				<h4>{{$blog->category}}</h4>				
				<ul class="blog-ic">					
					<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Don Benzo</span> </a> </li>
					 <li><span><i class="glyphicon glyphicon-time"> </i>{{$blog->created_at->diffForHumans()}}</span></li>		  						 	
					 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:145</span></li>
				</ul>
				@foreach($paragraphs as $paragraph)
				<p>{{$paragraph->paragraph}}</p><br><br>
				@endforeach
				@foreach($documents as $document)
				<p>{{$document->document}}</p>
				@endforeach


				<div class="comment-bottom heading">
    					<h3>Leave a Comment</h3>
    					<form action="submitcomments" method="post">
    					{{ csrf_field() }}	
    					<input type="hidden" name="blogid" value="{{$blog->id}}">
						<input type="text" required placeholder="Name" name="name">
						 @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
						<!-- <input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}"> -->
						<textarea cols="77" rows="6" placeholder="Comment" name="comment"></textarea>
						 @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
							<input type="submit" value="Submit Comment">
					</form>
    			</div>

			</div>

			<div class="col-md-2 about-right heading" style="font-size: 8;">
				<div class="abt-2">
					<h3>Comments Section</h3>
					<div class="might-grid">
						@foreach($comments as $comment)
						<label>{{$comment->name}}</label><p style="font-size: 8;">{{$comment->comment}}</p><br>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection