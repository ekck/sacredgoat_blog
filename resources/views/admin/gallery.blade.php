@extends('layouts.admin')

@section('title','Categories')
@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4><b>Image Gallery</b> <a href="#" id="addnew" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></h4></div>
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
		@foreach($galleries as $gallery)
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body">
			  	<div class="col-sm-4">
			  		{{$gallery->title}}
			  		<img src="storage/gallery/20.jpg" width="304" height="236" />
			  	</div>
			</div>
		</div>
		<div class="col-sm-2"></div>

		@endforeach
	</div>
</div>

{{csrf_field()}}
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="title">New Title</h4>
				      </div>
				      <div class="modal-body">
				    <div class="form-group" id="category "> 
						  <label class="col-md-2 control-label">Blog</label>
						    <div class="col-md-8 selectContainer">
						</div>
					</div>
						<br>
						<br>
						<br>


				      </div>
				      <div class="modal-footer">			        
				        <button type="button" id="addimage" class="btn btn-primary" data-dismiss="modal">Submit Image</button>				        
				      </div>
				    </div>
				  </div>
		</div>

</div>

@endsection