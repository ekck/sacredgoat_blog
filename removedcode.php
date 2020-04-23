<?php

//new from the save paragraph function that was trying to assign a paragraph rank on the paragraph so that when we query for paragraphs we just do them an order so that we can just paste them quite broadly

//trying to identify the paragraph rank of a paragraph

    	$paragraph = $request->paragraph;
    	$paragraphrank = Paragraph::where('paragraph','=',$paragraph)->first();
    	$paragraphrank = $paragraphrank->paragraph_rank;
    	if ($paragraphrank < 0) {
    		$paragraphrank = 1;
    	}

    	else
    	{
    		$paragraphrank = $paragraphrank + 1;
    	}


//Also the column on the database was removed so the code that tried to push data on the database no longer required

    	@foreach($paragraphs as $paragraph)
						@if($paragraph->pbid == $story->bid)
							@if($maxloopvalue++ > 2)
			 						@break
			 				@endif
							{{$paragraph->paragraph}}
						@endif
					@endforeach

$newparagraph->paragraph_rank = $paragraphrank;

?>

 <button id="{{$undoneblog->created_at}}" class="continueedit" value="{{$undoneblog->id}}" style="display: none;"></button>
	

	<script type="text/javascript">
		

		$('#saveparagraph').click(function(event){
		var paragraph = $('#paragraph').val();
		var blogtitle = $('#blogtitle').text();	

		$.post('newparagraph',{'paragraph':paragraph,'blogtitle':blogtitle,'_token':$('input[name=_token]').val()},function(data){
				 console.log(data);
				// $('#documentfs').load(location.href + ' #documentfs');
			});
		
	});

      //form submission details
		$('#formid').on('submit',function(event){
			event.preventDefault();
			var urls= $(this).attr('action');
			var paragraph = $('#paragraph').val();
			var blogtitle = $('#blogtitle').text();
			$.post(urls,{paragraph:paragraph, blogtitle:blogtitle},function(data){
			console.log('data');
				//$('#paragraphsclass').load(location.href + ' #paragraphsclass');

			});
		});

	</script>