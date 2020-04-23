@extends('layouts.admin')

@section('title','Categories')
@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4><b>Blogs Review</b></h4> <h5> Blog Details</h5></div>
			</div>
			@if(session('message'))
               <div class="alert alert-success">
                    {{ session('message') }}
               </div>
			@endif
		</div>
		<div class="col-sm-2"></div>
	</div>
	<div class="row">
		@foreach($categories as $category)

		@foreach($blogtitles as $blogtitle)
		@if($blogtitle->category == $category->category)		
		<h3>{{$category->category}}</h3><br>
		<h4>{{$blogtitle->title}}</h4>
		<br>
		<div class="col-sm-10" id="paragraphz">
			@foreach($paragraphs as $paragraph)
			@if($paragraph->blog_id == $blogtitle->id)

			{{paragraph->paragraph}}

			@endif
			@endforeach
			
		</div>
		

		@endif

		@endforeach

		@endforeach
	</div>
</div>

@endsection