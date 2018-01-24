@include('include.admin-header')

@if(count($blogs) > 0)
	@foreach($blogs->all() as $blog)
		<section class="edit-blog-section">
			<div class="container">
				<div class="alert-container"></div>
				<div class="row">
					<div class="col col-md-7">
						<div class="card mb-3">
					        <div class="card-header">
					          Block Form
					      	</div>
					        <div class="card-body">

					        	<form enctype="multipart/form-data" method="post" action="{{ url('/modifyblog') }}">
					        		{{csrf_field()}}
					        		{{session(['blogid' => $blog->blogid])}}
						        	<div class="form-group">
									  <label for="blog-title">Title:</label>
									  <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ $blog->title }}">
									  <div class="validate-container"></div>
									</div>

									<div class="form-group">
									  <label for="blog-content">Content:</label>
									  <textarea class="form-control" rows="5" id="blog_content" name="blog_content">{{ $blog->contents }}</textarea>
									  <div class="validate-container"></div>
									</div>

									<div class="form-group">
									  <label for="blog_img">Thumbnail:</label>
									  <input type="file" class="form-control" id="blog_img" name="blog_img" >
									  <div class="validate-container"></div>
									</div>

									<div class="form-group">
										<input type="hidden" class="form-control" name="blogimg" value="{{ $blog->cover_image }}">
									  <img width="250" height="150" id="blog_preview" src="{{ URL::asset('img/blog') .'/'. $blog->cover_image }}">
									  <button type="button" class="btn btn-danger" id="re-img">Remove</button>
									</div>
									
									<button type="submit" class="btn btn-primary">Submit</button>
									<a href="{{ url('/blog') }}" class="btn btn-default">Cancel</a>
								</form>
					        </div>
					      </div>
					</div>
					<div class="col col-md-5">
						<div class="card-mb3">
							
						</div>
					</div>
				</div>
			</div>
		</section>
	@endforeach
@endif

@include('include.admin-footer')