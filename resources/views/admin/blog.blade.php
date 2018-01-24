@include('include.admin-header')
{{session(['blogid' => ''])}}
<section class="admin-blog-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if(session('info'))
				  	<div class="alert alert-success">
				  		{{session('info')}}
				  	</div>
				@endif
				<div class="alert-container"></div>
				<div class="card mb-3">
			        <div class="card-header">
			          <i class="fa fa-table"></i> Data Table Example
			          <div class="pull-right">
		                <div class="btn-group">
		                  <a href="./createblog"><i class="fa fa-plus" aria-hidden="true" data-toggle="modal"> Blog</i></a>
		                </div>
		              </div>
			      	</div>
			        <div class="card-body">
			        	<div class="table-responsive">
			            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			              <thead>
			                <tr>
			                	<th></th>
			                	<th></th>
			                  	<th>Image</th>
			                  	<th>Title</th>
			                  	<th>content</th>
			                  	<th>Created By</th>
			                  	<th>Date Created</th>
			                  	<th>Date Updated</th>
			                </tr>
			              </thead>
			              <tfoot>
			                <tr>
			                	<th></th>
			                	<th></th>
			                  	<th>Image</th>
			                  	<th>Title</th>
			                  	<th>content</th>
			                  	<th>Created By</th>
			                  	<th>Date Created</th>
			                  	<th>Date Updated</th>
			                </tr>
			              </tfoot>
			              <tbody class="blogs-post-cotainer">

			        		</tbody>
						</table>
					</div>
			        </div>
			      </div>
			    </div>
			</div>
		</div>
	</div>
</section>



@include('include.admin-footer')