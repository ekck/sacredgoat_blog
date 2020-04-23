@extends('layouts.admin')

@section('title','Categories')
@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4><b>Comments Sections</b> </h4></div>
			  @if(session('message'))
               <div class="alert alert-success">
                    {{ session('message') }}
               </div>
			@endif
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Comments</h3>
				</div>
			  <div class="panel-body">
				@foreach($blogs as $blog)
				<h4>{{$blog->title}}</h4>
				<li class="list-group-item"> {{App\Comment::where('blog_id','=',$blog->id)->select('name','comment')->get()}} </li><br><br>

				@endforeach
			 </div>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>

@endsection