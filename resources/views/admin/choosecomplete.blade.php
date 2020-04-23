@extends('layouts.admin')

@section('title','Categories')
@section('body')
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default">
			  <div class="panel-body"> <h4><b>Incomplete Blogs</b>
          <a href="{{URL::to('admin/New-Title')}}" id="addnew" class="pull-right"><i class="fa fa-plus" aria-hidden="true">New Blog</i></a></h4> <h5> Choose A Blog to complete</h5>
        </div>
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
		@foreach($undoneblogs as $undoneblog)
		<div class="row" id="mainriff">
      <div class="col-sm-11">
        
                <div class="col-md-1">
                    <h5><strong>#</strong></h5>
                <div class="alert alert-success">
                   <p id="wanting"> {{$undoneblog->id}}</p>
                </div>
                    
                </div>

                <div class="col-md-2">
                <h5><strong>Title</strong></h5>
                <div class="alert alert-info">
                    {{$undoneblog->title}}
                </div>
                </div>

                <div class="col-md-3">
                <h5><strong>Tagged</strong></h5>
                <div class="alert alert-info">
                  @foreach($categories as $category)
                  @if($undoneblog->id == $category->bid)
                  {{$category->category}}<br>
                  @endif
                  @endforeach
                </div>
                </div>

                <div class="col-md-3">
                <h5><strong>Date Created</strong></h5>
                <div class="alert alert-info">
                    {{$undoneblog->created_at->diffForHumans()}}
                </div>
                </div>

                <div class="col-md-2">
                <h5><strong>Action</strong></h5>
                <div class="alert alert-info">
                    <button id="confirm" class="btn btn-default btn-xs" onclick="functionCon('{{$undoneblog->created_at}}')">Edit</button>                                        
                    <button id="regret" class="btn btn-danger btn-xs" onclick="functionReg('{{$undoneblog->id}}')" >Delete</button>
                    <button id="{{$undoneblog->id}}" class="deletetitle" value="{{$undoneblog->id}}" style="display: none;"></button>
                    <a href="{{url('continueedit?id=') . $undoneblog->id}}" id="{{$undoneblog->created_at}}" style="display: none;"></a>                    
                     {{csrf_field()}}


                </div>
                </div>

      </div>
                
   </div>


                <script>
                  function functionReg(id)
                  {
                    var x = confirm('confirm Delete the Blog?');
                      if (x == true) {
                          document.getElementById(id).click();
                       }

                  }

                  function functionCon(id)
                  {
                    var x = confirm('Continue with Editing the blog?');
                      if (x == true) {
                                   document.getElementById(id).click();
                       }

                  }
                </script>
		@endforeach
	</div>
</div>

<script>
	$(document).ready(function(){
    $('.deletetitle').click(function(event){
      var blog = $(this).val();
      $.post('deletepost',{'_token':$('input[name=_token]').val(),'blogid':blog},function(data){
        console.log(data);
        $('#mainriff').load(location.href + ' #mainriff');

      });
    });
    
		// $('.continueedit').click(function(event){
		// 	var blog = $(this).val();
  //     console.log(blog);
		// 	$.post('continueedit',{'_token':$('input[name=_token]').val(),'blogid':blog},function(data){
		// 	});
		// });

	});
	
</script>
@endsection