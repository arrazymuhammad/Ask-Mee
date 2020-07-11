	@if(Auth::check())
   <div class="row bg-white p-5">
		<div class="col-md-12">
	   		<h4><b><u>Komentar</u></b></h4>
	   		<ul class="list-group">
	   			@foreach($item->komentar->sortBy('created_at') as $komentar)
	   			<li class="list-group-item">
	   				{{$komentar->content}}
	   				<div class="small post-meta float-right">
						<span class="post-date" itemprop="dateCreated">Dikomentari oleh : {{$komentar->parent->user->name}}
							<span class="entry-date published">{{$komentar->created_at->diffForHumans()}}</span>
						</span>
					</div>
	   			</li>
	   			@endforeach
	   		</ul>
	   		<form action="{{url('comment')}}" method="post" class="mt-2">
	   			@csrf
	   			<input type="hidden" name="id_parent" value="{{$item->uuid}}">
	   			<input type="hidden" name="parent_type" value="{{$parent_type}}">
	   			<div class="input-group mb-3">
				  	<input type="text" class="form-control" name="content">
				  	<div class="input-group-append">
				    	<button class="btn btn-dark">Komentar</button>
				  	</div>
				</div>
	   		</form>	
	   	</div>
   </div>
   @endif