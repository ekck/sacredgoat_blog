@extends('layouts.admin')
@section('title','new blog')

@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4><b>New Blog</b></h4> <h5> Blog Details</h5></div>
			</div>
		</div>
		@if(session('message'))
               <div class="alert alert-success">
                    {{ session('message') }}
               </div>
			@endif
		<div class="col-sm-2"></div>
	</div>

	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Blog Title <a href="#" id="addnew" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></h4>
				</div>
				<div class="panel-body">
					
				</div>
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
				        <p><input type="text" name="addTitle" class="form-control" placeholder="Blog Title" id="addTitle"></p>

				        <br>
						<br>

				    <div class="form-group" id="category "> 
				  <label class="col-md-3 control-label">Category</label>
				    <div class="col-md-9 selectContainer">
				    <div class="input-group">
				        <div class="input-group">
				        	@foreach($categories as $category)
				        	<label class="checkbox-inline"><input type="checkbox" name="selcat[]" id="sel{{$category->id}}"  value="{{$category->id}}">{{$category->category}}</label>
				        	@endforeach
						</div>
				  </div>
				</div>
			</div>


			<br>
			<br>
			<br>


				      </div>
				      <div class="modal-footer">			        
				        <button type="button" id="Addbutton" class="btn btn-primary" data-dismiss="modal">Submit Title</button>				        
				      </div>
				    </div>
				  </div>
		</div>

	</div>
</div>

{{csrf_field()}}

<script>
	$(document).ready(function(){
		$('.ourItem').each(function(){
			$(this).click(function(event){
				var text = $(this).text();
				$('#title').text('Edit Title');
				$('#addItem').val(text);
				$('#delete').show('400'); 
				$('#savechanges').show('400');
				$('#Addbutton').hide('400 ')

			});
		});


		$('#addnew').click(function(event){
				$('#title').text('New Title');
				$('#addItem').val("");
				$('#delete').hide('400'); 
				$('#savechanges').hide('400');
				$('#Addbutton').show('400 ')
		});

		$('#Addbutton').click(function(event){
			var title = $('#addTitle').val();
			var data = new Array();
			$("input[name='selcat[]']:checked").each(function() {
				  data.push($(this).val());
				});
			$.post('newtitle',{'title':title,  'data':data, '_token':$('input[name=_token]').val()},function(data){
				console.log(data);
				window.location = "/admin/newblog";
				$('#titles').load(location.href + ' #titles');
			});
		});


	});


</script>

@endsection