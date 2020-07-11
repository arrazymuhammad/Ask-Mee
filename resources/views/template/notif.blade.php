@foreach(['success', 'warning', 'danger'] as $status)
	@if (session($status))
	  <div class="alert alert-{{$status}} alert-dismissable custom-{{$status}}-box">
	     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	     <strong> {{ session($status) }} </strong>
	  </div>
	@endif
@endforeach

@foreach ($errors->all() as $message)
	<div class="alert alert-danger alert-dismissable custom-danger-box">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong> {!!$message!!} </strong>
	</div>
@endforeach