@extends('layouts.admin')

@section('title','Categories')
@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4><b>Blogs</b></h4> <h5> Blogs Details</h5></div>
			</div>
			@if(session('message'))
               <div class="alert alert-success">
                    {{ session('message') }}
               </div>
			@endif
		</div>
		<div class="col-sm-2"></div>
	</div>
	<div class="row" id="mainriff">

		@foreach($blogs as $blog)
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-header">					
					<h3 style="padding-left: 15px;">{{$blog->title}} <span style="float: right; padding-right: 20px;"><button class="btn btn-default btn-xs" onclick="functioned('{{$blog->id}}')">edit</button></span>
	                    <a href="{{url('admin/editblog?id=') . $blog->id}}" id="{{$blog->id}}" style="display: none;"></a>  

					 </h3>
					<h4 style="padding-left: 15px; color: red;">
						@foreach($categories as $category)
		                  @if($blog->id == $category->bid)
		                  {{$category->category}}|
		                  @endif
		                @endforeach
                 		 <span style="float: right; padding-right: 20px;"><button class="btn btn-danger btn-xs" onclick="functiondel('{{$blog->created_at}}')">Delete</button></span> 
						<button id="{{$blog->created_at}}" value="{{$blog->id}}" class="deletebutton" style="display: none;"></button>
					 </h4>
				</div>
				<div class="panel-body">
					@foreach($documents as $document)
					@if($document->blog_id == $blog->id)
					<li class="list-group-item" data-toggle="modal" data-target="#myModal">
					{{$document->document}}</li><br><br>
					@endif
					@endforeach

					@foreach($paragraphs as $paragraph)
					@if($paragraph->blog_id == $blog->id)
					<li class="list-group-item" data-toggle="modal" data-target="#myModal">{{$paragraph->paragraph}}</li><br><br>
					
					@endif
					@endforeach					
				</div>
			</div>


		{{$blogs->links()}}
		</div>
		<div class="col-sm-2"></div>

		@endforeach
		
		<script>
			function functioned(id)
			{
				var x = confirm('Confirm you want to edit the blog');
				if(x == true)
				{
					  document.getElementById(id).click();
				}
			}
			function functiondel(id)
			{
				var x = confirm('Are you sure you want to delete the blog?')
				if(x == true)
				{
					document.getElementById(id).click();
				}
			}
		</script>

	</div>
</div>

<script>
	$(document).ready(function(){
    $('.deletebutton').click(function(event){
      var blog = $(this).val();
      $.post('deletepost',{'_token':$('input[name=_token]').val(),'blogid':blog},function(data){
        console.log(data);
        $('#mainriff').load(location.href + ' #mainriff');

      });
    });

	});
	
</script>

@endsection