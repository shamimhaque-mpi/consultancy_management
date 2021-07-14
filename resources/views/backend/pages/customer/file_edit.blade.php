@extends('backend.layout.app')

@section('title', 'Update File')

@section('content')

	@if(session()->has('success'))
	<div class="alert alert-primary mt-4" role="alert">
	  {{session()->get('success')}}
	</div>
	@endif

	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<span class="card-icon">
				</span>
				<h3 class="card-label">Update File</h3>
			</div>
		</div>
		<div class="card-body">
			
			<form method="POST" action="">
				@csrf
				<div class="d-flex justify-content-between">

					<div  class="d-flex align-items-center mb-1">
						<h3 class="p-0 m-0">File#{{$file->id}}</h3> &nbsp;
						<select name="status" class="form-control" required>
							<option value="">Select a status</option>
							@php
								$permission = json_decode((Auth::guard('admin')->user()->permission ?? ''), true);
								$permission = $permission ?? [];
							@endphp

							@foreach($permission as $value)
							<option value="{{$value}}" {{$file->status==$value ? 'selected' : ''}}>{{ucfirst($value)}}</option>
							@endforeach
						</select>
					</div>


					<div class="action d-flex">
						<input type="submit" class="custom_btn btn btn-success">
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Service</th>
							<td>{{$file->service->service_name ?? 'N/A'}}</td>

							<th>Customer</th>
							<td>
								@if(!empty($file->customer->type) && $file->customer->type=='person')
									{{$file->customer->customer_name ?? 'N/A'}}
								@elseif(!empty($file->customer->type))
									{{$file->customer->company_name ?? 'N/A'}}
								@endif
							</td>
						</tr>
						<tr>
							<th>Shop</th>
							<td colspan="3">
								<div class="d-flex">
									<input type="text" value="{{$file->user->name ?? 'N/A'}}" class="form-control mr-1" readonly>
								</div>
							</td>
						</tr>
					</table>
				</div>


				<div>
					<strong>DATA OF THE DECHIARANT</strong>
					<hr>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label>Designation</label>
						<div class=" form-group">
							<input type="text" name="designation" value="{{$file->designation}}" class="form-control">
						</div>
					</div>

					<div class="col-md-6">
						<label>Name</label>
						<div class=" form-group">
							<input type="text" name="name" value="{{$file->name}}" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<label>Common</label>
						<div class=" form-group">
							<input type="text" name="common" value="{{$file->common}}" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<label>Address</label>
						<div class=" form-group">
							<input type="text" name="address" value="{{$file->address}}" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<label>POSTAL CODE</label>
						<div class=" form-group">
							<input type="text" name="postal_code" value="{{$file->postal_code}}" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label>Telephone</label>
						<div class=" form-group">
							<input type="text" name="telephone" value="{{$file->telephone}}" class="form-control">
						</div>
					</div>

					<div class="col-md-6">
						<label>E-mail</label>
						<div class=" form-group">
							<input type="text" name="email" value="{{$file->email}}" class="form-control">
						</div>
					</div>
				</div>

				<div>
					<strong>DSU type (X)</strong>
					<hr>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label>Ordinary or Standard ISEE</label>
						<div class=" form-group">
							<input type="text" name="ordinary_or_standard_isee" value="{{$file->ordinary_or_standard_isee}}" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<label>ISEE Universita</label>
						<div class=" form-group">
							<input type="text" name="isee_universita" value="{{$file->isee_universita}}" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<label>ISEE for minors</label>
						<div class=" form-group">
							<input type="text" name="isee_for_minors" value="{{$file->isee_for_minors}}" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<label>ISEE Socio Sanitario</label>
						<div class=" form-group">
							<input type="text" name="isee_socio_sanitario" value="{{$file->isee_socio_sanitario}}" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<label>Current ISEE</label>
						<div class=" form-group">
							<input type="text" name="current_isee" value="{{$file->current_isee}}" class="form-control">
						</div>
					</div>
				</div>

				<div>
					<strong>Other information</strong>
					<hr>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label>Household (N)</label>
						<div class=" form-group">
							<input type="text" name="household" value="{{$file->household}}" class="form-control">
						</div>
					</div>

					<div class="col-md-3">
						<label>House (Rent, Property, Other)</label>
						<div class=" form-group">
							<input type="text" name="house_rent_property_other" value="{{$file->house_rent_property_other}}" class="form-control">
						</div>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-md-6 mb-2" id="comment_area">
						@if($file->comments) @foreach($file->comments as $row)
							<div class="box_ {{$row->is_authority == 1 ? 'authority' : ''}}">
								<strong>Date: {{$row->created_at}}</strong>
								<p>{{$row->comments}}</p>
								<button type="button" class="delete_btn" onclick="deleteComment(this)" data-commentid="{{$row->id}}">&times;</button>
							</div>
						@endforeach @endif
					</div>

					<div class="col-md-6 mb-2" id="attachment_area">
						@if($file->attachments) @foreach($file->attachments as $row)
							<div class="box_ {{$row->is_authority == 1 ? 'authority' : ''}}">
								<strong>Date: {{$row->created_at}}</strong>
								<br>
								@if($row->is_authority==1)
								<p>See This Document</p>
								@endif
								<a href="{{asset($row->path)}}" download="{{$row->file_name}}">{{$row->file_name}}</a>
								<button type="button" class="delete_btn_attachment" onclick="deleteAttachment(this)" data-attachmentid="{{$row->id}}">&times;</button>
							</div>
						@endforeach @endif
					</div>
				</div>

				<div class="row pb-5">
					<div class="col-md-6">
						<label>Comments</label>
						<div class="form-group border border-primary p-2">
							<textarea class="form-control" id="comments" placeholder="Enter Your Comments Here..."></textarea>
							<div class="w-100 text-right">
								<div class="btn-group">
									<button type="button" id="save_comment" class="btn btn-primary mt-2">Save</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<label>Attachments</label>
						<div class="form-group border border-primary p-2 position-relative">
							<input type="file" id="file" class="form-control p-1">
							<div class="w-100 text-right">
								<div class="btn-group">
									<button type="button" class="btn btn-primary mt-2" id="upload_file">Upload</button>
								</div>
							</div>
							<div id="file_name"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection


@section('style')
<style>
	p {
		padding: 0;
		margin: 0;
	}
	.authority {
		background: #ffc8bb!important;
	}
	.custom_btn {
	    padding: 5px 11px;
	    margin-right: 2px;
	    margin-bottom: 4px;
	}
	.custom-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.custom-btn {
	    border: 1px solid #ddd;
	    padding: 2px 7px;
	}
	.box_ {
	    background: #fff2ef;
	    padding: 11px;
	    position: relative;
	}
	.box_ + .box_ {
	    border-top: 1px solid #f5d0c7;
	}
	.box_ .delete_btn, .box_ .delete_btn_attachment {
	    position: absolute;
	    top: 5px;
	    right: 5px;
	    border: 1px solid #ddd;
	    border-radius: 10px;
	}
	.box_ strong{
	    font-weight: 500;
	}
	#file_name {
	    position: absolute;
	    left: 10px;
	    bottom: 10px;
	    width: 351px;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: nowrap;
	}
</style>
@endsection

@section('script')
<script>
	(()=>{
		var tax_id = "{{$file->tax_id}}";

		$('#save_comment').on('click', ()=>{
			if($('#comments').val()!=''){
				var formdata = new FormData();
				    formdata.append('comments', $('#comments').val());
				    formdata.append('tax_id', tax_id);
					formdata.append('is_authority', 1);
					formdata.append('file_id', "{{$file->id}}");

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200) {
				    	if(xhttp.responseText){
				    		var data = JSON.parse(xhttp.responseText);
				    		var div  = document.createElement('div');

				    		div.innerHTML = `
					    		<div class="box_ authority">
									<strong>Date: ${data.created_at}</strong>
									<p>${data.comments}</p>
									<button type="button" onclick="deleteComment(this)" class="delete_btn" data-commentid="${data.id}">&times;</button>
								</div>
				    		`;
				    		$('#comment_area').append(div);
				    		$('#comments').val('');
				    	}		    	
				    }
				};
				xhttp.open("POST", "{{url('api/new/comments')}}", true);
				xhttp.send(formdata);
			}
		});
	})();


	(()=>{
		$('#attachment_type').on('change', ()=>{

			var type = $('#attachment_type').val();
			if(type=='image'){
				$('#file').attr('accept', 'image/*');				
			}
			else if(type='pdf'){
				$('#file').attr('accept', 'application/pdf');
			}
			$('#file').click();
		});
	})();
	

	(()=>{
		$('#file').on('change', ()=>{
			$('#file_name').text($('#file').val());			
		});
	})();

	(()=>{
		var tax_id = "{{$file->tax_id}}";

		$('#upload_file').on('click', ()=>{
			var file 	 = document.querySelector('#file').files[0];
			var formdata = new FormData();
			    formdata.append('file', file);
			    formdata.append('tax_id', tax_id);
				formdata.append('is_authority', 1);
				formdata.append('file_id', "{{$file->id}}");

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	if(xhttp.responseText){
			    		var data = JSON.parse(xhttp.responseText);

			    		var div  = document.createElement('div');

			    		div.innerHTML = `
				    		<div class="box_ authority">
								<strong>Date: ${data.created_at}</strong>
								<br>
								<p>See This Document</p>
								<a href="{{url('/')}}/${data.path}" download="${data.file_name}">${data.file_name}</a>
								<button type="button" onclick="deleteAttachment(this)" class="delete_btn" data-attachmentid="${data.id}">&times;</button>
							</div>
			    		`;
			    		$('#attachment_area').append(div);
			    	}		    	
			    }
			};
			xhttp.open("POST", "{{url('api/new/file')}}", true);
			xhttp.send(formdata);
		});
	})();


	function deleteComment(tag){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				if(xhttp.responseText){
					$(tag).closest('.box_').remove();
				};
			}
		};
		xhttp.open("POST", "{{url('api/delete/comment')}}/"+(tag.dataset.commentid), true);
		xhttp.send();
	}


	function deleteAttachment(tag){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				if(xhttp.responseText){
					$(tag).closest('.box_').remove();
				};
			}
		};
		xhttp.open("POST", "{{url('api/delete/file')}}/"+(tag.dataset.attachmentid), true);
		xhttp.send();
	}
</script>
@endsection

