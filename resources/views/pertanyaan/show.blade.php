@extends('template.base')

@section('content')
	<div class="main-body">
		<div class="container custom pb-5 pt-3"   style="padding: 10px">
			<div class="row">
				@if($pertanyaan->is_mine)
				<div class="col-md-12 text-right">
					<a href="{{url('question', $pertanyaan->uuid)}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<form action="{{url('question', $pertanyaan->uuid)}}" method="post" style="display: inline">
						@csrf
						@method('delete')
						<button class="btn btn-danger" ><i class="fa fa-remove"></i></button>
					</form>
				</div>
				@endif
				<div  class="col-md-12">
					<div class="inner-question bg-white">
						<article  class="article-question article-post clearfix question-type-normal py-0">
							<div class="single-inner-content">
								<div class="row select-category single-head m-0">
									<div class="col-3 col-sm-2 col-md-2 col-lg-2 px-lg-1 text-center d-none d-sm-flex">
										<div class="question-image-vote ans-bg w-100">
											<div class="vote-count ans text-left">
												<span style="font-size: 20px; font-weight: bold;">{{$pertanyaan->jawaban->count()}}</span> <span class="ans-text">Jawaban</span>
											</div>
										</div>
									</div>
									<div class="col-md-10 col-sm-10 col-12 col-lg-10 px-1">
										<h1 class="post-titles"><a class="post-titles" href="" rel="bookmark">{{$pertanyaan->judul}}</a></h1>
										<div class="row">
											<div class="col-md-12">
												<div class="small post-meta float-right">
													<span class="post-date" itemprop="dateCreated">Ditanyakan oleh : {{$pertanyaan->user->name}}
														<span class="entry-date published">{{$pertanyaan->created_at->diffForHumans()}}</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="question-inner row">
									<div class="col-sm-2 col-md-2 col-lg-2 col-6 px-lg-1 ">
										<div class=" question-image-vote px-sm-0 text-center vote-bg" style="height: 100%">
											@if(Auth::check() && !$pertanyaan->is_mine && !$pertanyaan->is_voted)
											<a class="question_vote_up vote_not_user" href="{{url('vote/question', $pertanyaan->uuid)}}/up" title="Like"><i class="fa fa-caret-up fa-2x" aria-hidden="true"></i></a>
											@endif
											<span class="vote votesCount#">{{$pertanyaan->voted_count}} Votes</span> 
											@if(Auth::check() && !$pertanyaan->is_mine && !$pertanyaan->is_voted && Auth::user()->point >= 15)
											<a class="question_vote_down vote_not_user" href="{{url('vote/question', $pertanyaan->uuid)}}/down" title="Dislike"><i class="fa fa-caret-down fa-2x" aria-hidden="true"></i></a>
											@endif
										</div>	
									</div>
									<div class="col-sm-10 col-md-10 col-lg-10 px-lg-1">
										<div class="question-content question-content-second pt-sm-4">
											<div class="post-wrap-content">
											   	<div class="question-content-text">
													{!!$pertanyaan->content!!}
											   	</div>
											</div>
										</div> 
										<div class="tagcloud">
											<div class="question-tags"><i class="icon-tags"></i>
												@foreach($pertanyaan->tag_arr as $tag)
													<a href="{{url('tag', $tag)}}">{{$tag}}</a> 
												@endforeach
											</div>
									   </div>
									   @include('pertanyaan.komentar', ['item' => $pertanyaan, 'parent_type' => 1])
									</div>
								</div>
							</div>
						</article>
					</div>
					<div class="inner-question bg-white">
						@foreach($pertanyaan->jawaban as $jawaban)
						<article class="article-question  article-post clearfix question-type-normal @if($jawaban->is_best) bg-best @endif">
							<div class="single-inner-content">
								<div class="question-inner row">
									<div class="col-sm-2 col-md-2 col-lg-2 col-6 px-lg-1 ">
										<div class=" question-image-vote px-sm-0 text-center vote-bg">
											@if(Auth::check() && !$jawaban->is_mine && !$jawaban->is_voted)
											<a class="question_vote_up vote_not_user" href="{{url('vote/answer', $jawaban->uuid)}}/up" title="Like"><i class="fa fa-caret-up fa-2x" aria-hidden="true"></i></a>
											@endif
											<span class="vote votesCount#">{{$jawaban->voted_count}} Votes</span> 
											@if(Auth::check() && !$jawaban->is_mine && !$jawaban->is_voted && Auth::user()->point >= 15)
											<a class="question_vote_down vote_not_user" href="{{url('vote/answer', $jawaban->uuid)}}/down" title="Dislike"><i class="fa fa-caret-down fa-2x" aria-hidden="true"></i></a>
											@endif
										</div>	
										@if($jawaban->is_best)
										<div class="row">
											<div class="col-md-12 text-center">
												<i class="fa fa-check fa-3x text-success"></i>
											</div>
										</div>
										@endif
									</div>
									<div class="col-md-10 answer-section">
										<div class="row">
											<div class="col-md-12">	
												<div class="question-content question-content-second">
													<div class="post-wrap-content">
													   	<div class="question-content-text">
															{!!$jawaban->content!!}
													   	</div>
													</div>
													<div class="answer-info bg-info">
														<a class="post-author text-white" href="#">{{$jawaban->user->name}}</a><br>
														<span class="comment-date text-white" style="font-size: 12px"> Dijawab {{ $jawaban->created_at->diffForHumans()}} </span>
														@if($pertanyaan->is_mine && !$pertanyaan->id_jawaban_terbaik)
														<a href="{{url('best-answer', $jawaban->uuid)}}" class="btn btn-success d-block"><i class="fa fa-check"></i> Jawaban Terbaik</a>
														@endif
														@if($jawaban->is_mine)
															<div class="col-md-12">
																<div class="btn-group d-flex">
																	<a href="{{url('answer', $jawaban->uuid)}}/edit" class="btn btn-warning w-100"><i class="fa fa-edit"></i></a>
																	<form action="{{url('answer', $jawaban->uuid)}}" method="post" style="display: inline" class=" w-100">
																		@csrf
																		@method('delete')
																		<button class="btn btn-danger w-100" ><i class="fa fa-remove"></i></button>
																	</form>
																</div>
															</div>
														@endif
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12">
										   		@include('pertanyaan.komentar', ['item' => $jawaban, 'parent_type' => 2])
											</div>
										</div>
									</div>
								</div>								
							</div>
						</article>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container custom pb-5 pt-3">
				<div class="row">
					<div class="col-md-12">
						@if(Auth::check())
						<form action="{{url('question', $pertanyaan->uuid)}}/comment" method="post">
							@csrf
							<div class="form-group">
								<textarea name="content" class="text-comment textarea" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-leave-comment w-100 mb-1">Submit an answer</button>
							</div>
						</form>
						@else
							<a data-toggle="modal" data-target="#signupModal" class="btn btn-primary text-white w-100 mb-1"> Login to answer </a>
						@endif
					</div>
				</div>
			</div>
		</div>
			
@endsection

@push('style')
  <link rel="stylesheet" href="{{url('assets')}}/summernote/summernote-bs4.css">
  <style>
  	.vote-bg {
	    vertical-align: middle;
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    justify-content: center;
  	}
  	.bg-best {
  		background: #dfd;
  	}
  	.answer-info {
  		padding: 10px;
  		width: 25%;
  		float: right;
  	}
  	.answer-section {
  		min-height: 100px;
  	}
  </style>
@endpush

@push('script')

<script src="{{url('assets')}}/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>

@endpush