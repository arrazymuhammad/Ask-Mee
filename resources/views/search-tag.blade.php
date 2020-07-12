@extends('template.base')

@section('content')
        <div class="container custom py-5">
            <div class="row">
                <div  class="col-md-12">
                    <h2>
                        Pertanyaan Terkait Tag :  {{$tag}}
                    </h2>
                    <div class="inner-question bg-white">
                        @foreach($list_pertanyaan as $pertanyaan)
                            <article  class="article-question article-post clearfix question-type-normal home">
                                <div class="single-inner-content">
                                    <div class="question-inner row">
                                        <div class="col-md-12 col-lg-9 col-xl-9">
                                            <div class="question-content question-content-first">
                                                <h2 class="post-title">
                                                    <a class="post-title" href="{{url('question', $pertanyaan->uuid)}}" rel="bookmark">{{$pertanyaan->judul}}</a>
                                                </h2>
                                            </div>
                                            <div class="question-content question-content-second">
                                                <div class="post-wrap-content">
                                                  <div class="tagcloud">
                                                        <div class="question-tags">
                                                            <i class="icon-tags"></i>
                                                            @foreach($pertanyaan->tag_arr as $tag)
                                                            <a href="{{url('tag', $tag)}}">{{$tag}}</a>
                                                            @endforeach
                                                        </div>
                                                   </div>
                                                </div>
                                                <div class="wpqa_error"></div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12 col-lg-3 col-xl-3 px-lg-1 container-fluid">
                                            <div class="row mx-md-0">
                                                <div class="col-4 question-image-vote px-sm-1 px-md-2 vote-bg text-center">
                                                    <div class="vote-count text-center"><span class="counter-num">{{$pertanyaan->voted_count}}</span> <span>Vote</span></div>
                                                </div>
                                                <div class="col-4 question-image-vote px-sm-1 px-md-2 text-center ans-bg">
                                                    <div class="vote-count text-center"><span class="counter-num">{{$pertanyaan->jawaban->count()}}</span> <span>Jawaban</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <footer class="question-footer question-content">
                                                <div class="question-header">
                                                    <div class="post-meta">
                                                        <span class="post-date" itemprop="dateCreated">Ditanyakan: <span class="entry-date published">{{$pertanyaan->created_at->format('d M Y')}}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </article> 
                            @if($list_pertanyaan->count() == 0)
                            <div class="record-not-found">
                                <i class="fa fa-frown-o" aria-hidden="true" style=""></i>
                                <h2 class="heading-error" style="">No Questions Found</h2>
                            </div>
                            @endif
                            {{$list_pertanyaan->links()}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection