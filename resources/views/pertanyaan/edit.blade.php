@extends('template.base')

@section('content')
<div class="container custom py-5">
	<div class="row justify-content-md-center">
		<div  class="col-md-8 col-lg-7">
			<div class="inner-question main ask-question-main">
				<form method="post" action="{{url('question', $pertanyaan->uuid)}}">
					@csrf 
					@method('put')
					<div class="form-group">
						<label>Judul Petanyaan</label>
						<input class="form-control" name="judul" value="{{$pertanyaan->judul}}" type="text" placeholder="Judul Pertanyaan" required>
					</div>
					<div class="form-group">
						<label>Deskripsi Pertanyaan</label>
						<div class="alert alert-info">Seluruh Tag HTML dapat diselipkan kecuali tag &lt;script&gt;</div>
						<textarea name="content" class="textarea form-control" required>{!!$pertanyaan->content!!}</textarea>
					</div>
					<div class="form-group tage-input-main">
						<label>Tags</label>
						<div class="alert alert-info">Pisahkan dengan koma. (misal : tag1, tag2, tag3)</div>
						<input id="tags" name="tags" class="tags-input w-100" value="{{$pertanyaan->tag_to_string}}" type="text" placeholder="" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success">Simpan Pertanyaan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('style')
  <link rel="stylesheet" href="{{url('assets')}}/summernote/summernote-bs4.css">
@endpush

@push('script')

<script src="{{url('assets')}}/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

@endpush