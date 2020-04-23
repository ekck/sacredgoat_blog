@extends('layouts.admin')
@section('title','new blog')

@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4>Story: {{$title}} :<br> Tagged : 
			  	@foreach($categories as $category)
                  {{$category->category}} |
                @endforeach

			  </h4> <h5> Blog Details</h5></div>
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
{{csrf_field()}}
	<div class="row">
		<li id="blogpostid" style="display: none;">{{$blogpostid}}</li>
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>BlogParagraph<a href="#" id="addnew" class="pull-right" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus" aria-hidden="true"></i></a></h4>
				</div>
				<div class="panel-body">

				<div class="form-group" id="paragraphsclass">
					<ul class="list-group">
						@foreach($paragraphs as $paragraph)
							<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$paragraph->paragraph}}</li><br><br>					
						@endforeach
					
					</ul>
				</div>
					
				</div>
			</div>
		</div>


		
		<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="title">New Paragraph</h4>
				      </div>
				      <!-- <form></form> -->
				      <div class="modal-body">
				      	<form method="POST"  id="formid">
				      		<div class="input-group">
					        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
					        	<textarea style="height: 40px;" class="form-control" name="paragraph" id="paragraph" placeholder="Paste/write the Paragraph Here"></textarea>
					  </div>
					  </form>	
				        
				      </div>
				      <div class="modal-footer">
				        <div class="modal-footer">
				        <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal" style="display: none;">Delete</button>
				        <button type="button" id="savechanges" class="btn btn-primary" style="display: none;">Save changes</button>				        
				        <button type="button" id="saveparagraph" class="btn btn-primary" data-dismiss="modal">Add Paragraph</button>				        
				      </div>

				      			        
				      </div>
				    </div>
				  </div>
		</div>
		
	</div>

	<div class="row">
		{{ csrf_field() }}
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Image</h4>
				</div>
				<div class="panel-body">
					<div class="form-group" id="Gallery">
						<ul class="list-group">
							@foreach($galleries as $gallery)
								<li class="list-group-item ourItem"><img src="storage//gallery/{{$gallery->image}}" style="height: 250px;" width="920px;"></li><br><br>				
							@endforeach
						
						</ul>
					</div>

				    <form method="post" enctype="multipart/form-data" action="storeimage" files="true">
						{{ csrf_field() }}
				    	<input type="hidden" name="blogpostide" value="{{$blogpostid}}">
				    	<div class="form-group col-md-4">
                        <label>Select Image</label>
                        <input type="file" required name="image" value="{{ old('image') }}"/>
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
				    		
				    	</div>
				    	<div class="form-group col-md-4" >
				    		<br>
				    		<button type="submit" class="btn btn-primary">submit Image</button>
				    	</div>
				    	
				    </form>
					
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Complete Editing</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
					  <label class="col-md-4 control-label"></label>
					  <div class="col-md-4">
					  	<form>
					  	<a class="btn btn-default" href="{{url('admin/editcomplete?id=') . $title}}" type="btn btn-default">Complete Edit</a>
					    </form>
					  </div>
					</div>

				
					
					
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
			var category = $('#category').val();
			$.post('newtitle',{'title':title, 'category':category, '_token':$('input[name=_token]').val()},function(data){
				console.log(data);
				$('#titles').load(location.href + ' #titles');
			});
		});


	});	

	$(document).ready(function(){
		$('#submitdocument').click(function(event){
			var blogpostid = $('#blogpostid').text();
			var documentf = $('#documentf').val();
			var blogtitle = $('#blogtitle').text();
			// console.log(blogtitle);
			$.post('newdocument',{'documentf':documentf, 'blogpostid':blogpostid,'blogtitle':blogtitle,'_token':$('input[name=_token]').val()},function(data){
				// console.log(data);
				// $('#documentfs').load(location.href + ' #documentfs');
			});
		});

		
		$('#saveparagraph').click(function(){
			var blogpostid = $('#blogpostid').text();
			var paragraph = $('#paragraph').val();
			var blogtitle = $('#blogtitle').text();
			$.post('newparagraph',{'paragraph':paragraph, 'blogpostid':blogpostid,'blogtitle':blogtitle, '_token':$('input[name=_token]').val()},function(data){
				console.log(data);
				 $('#paragraphsclass').load(location.href + ' #paragraphsclass');
			});
		});

		
		$('#storeimagebutton').click(function(){
			var blogpostid = $('#blogpostide').text();
			var image = $('#image').val();
			$.post('storeimage',{'blogpostid':blogpostid, 'image':image, '_token':$('input[name=_token]').val()},function(data){
				console.log(data);
				 //$('#paragraphsclass').load(location.href + ' #paragraphsclass');
			});
		});
		
	});


</script>

@endsection