@extends('frontend.layouts.app')


@section('title', 'File')

@section('content')
<nav aria-label="breadcrumbx" class="mt-2">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
    <li class="breadcrumb-item">File</li>
  </ol>
</nav>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{session()->get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="customer-list">
	<div class="custom-header">
		<h3>File List</h3>
		<a href="#" class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New</a>
	</div>
	<hr>
	<form method="POST" action="">
		@csrf
		<div class="row">
			<div class="col-md-3">
				<label>Tax ID</label>
				<div class="form-group">
					<input type="text" name="search[tax_id]" class="form-control">
				</div>
			</div>

			<div class="col-md-3">
				<label>Service</label>
				<div class="form-group">
					<select name="search[service_id]" class="form-control">
						<option value="">--Select service--</option>
						@if($all_services) @foreach($all_services as $row)
						<option value="{{$row->id}}">{{$row->service_name}}</option>
						@endforeach @endif
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<label>Status</label>
				<div class="form-group">
					<select name="search[status]" class="form-control">
						<option value="">--Select service--</option>
						@foreach(config('app.status') as $value)
						<option value="{{$value}}">{{ucfirst($value)}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<label>&nbsp;</label>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Filter">
				</div>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Tax ID</th>
				<th>Name</th>
				<th>Shop Name</th>
				<th>Service</th>
				<th>Status</th>
				<th width="60">Action</th>
			</tr>
			@if(!$all_files->isEmpty()) @foreach($all_files as $row)
			<tr>
				<td>{{$row->id}}</td>
				<td>{{$row->tax_id}}</td>
				<td>
					@if($row->customer && $row->customer->type=='company')
						{{$row->customer->company_name ?? 'Not Found'}}
					@else
						{{$row->customer->customer_name ?? 'Not Found'}}
					@endif
				</td>
				<td>{{Auth::user()->name ?? 'N/A'}}</td>
				<td>{{$row->service->service_name}}</td>
				<td>{{ucfirst($row->status)}}</td>
				<td>
					<div class="btn-group">
						@if($row->status=='completed')
						<a href="{{route('user.file.view', $row->id)}}" title="Edit" class="custom-btn btn btn-success">View</a>
						@else
						<a href="{{route('user.file.edit', $row->id)}}" title="Edit" class="custom-btn btn btn-success">Edit</a>
						@endif

						@if($row->status=='pending')
						<a href="{{route('user.file.delete', $row->id)}}" onclick="return confirm('Are You Sure ??')" title="Delete" class="custom-btn btn btn-danger">Delete</a>
						@endif
					</div>
				</td>
			</tr>
			@endforeach @endif
		</table>
	</div>
</div>


<!-- Modal For New File -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="POST" action="{{route('user.file.store')}}">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New File</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>

			  	<div class="modal-body">
			        <div class="row">
			        	<div class="col-md-6">
				        	<label for="service_category">Service Category</label>
				        	<select id="service_category" class="form-control">
				        		<option value="">Select Service Category</option>
				        		@if(!$categories->isEmpty()) @foreach($categories as $row)
				        		<option value="{{$row->id}}">{{$row->category_name}}</option>
				        		@endforeach @endif
				        	</select>        		
			        	</div>

			        	<div class="col-md-6">
					        <div class="form-group">
					        	<label for="service_id">Service </label>
					        	<select name="service_id" id="service" class="form-control" required>
					        		<option value="">Select Service</option>
					        	</select>
					        </div>
			        	</div>
			        </div>

					<div class="form-group">
						<label for="tax_id">Customer Tax ID</label>
						<input type="text" name="tax_id" class="form-control" id="tax_id" required>
					</div>

					<div class="form-group">
						<label for="customer_type">Name</label>
						<input id="customer_name" class="form-control" readonly>
					</div>

					<div class="form-group">
						<label for="customer_type">Customer Type</label>
						<input id="customer_type" class="form-control" readonly>
					</div>

			        <div class="row">
			        	<div class="col-md-6">
				        	<label for="date_of_birth">Date Of Birth</label>
				        	<input type="date" id="date_of_birth" class="form-control" readonly>      		
			        	</div>

			        	<div class="col-md-6">
					        <div class="form-group">
					        	<label for="telephone">Telephone </label>
					        	<input id="telephone" class="form-control" readonly>
					        </div>
			        	</div>

			        </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection


@section('script')
<script>
	(()=>{
		$('#service_category').on('change', ()=>{
			var formdata = new FormData();
			    formdata.append('cat_id', $('#service_category').val());
			var option = `<option value="">Select Service</option>`;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	var services = JSON.parse(xhttp.responseText);
			    	(services).forEach((data, key)=>{
			    		option += `<option value="${data.id}">${data.service_name}</option>`;
			    	});
			    	$('#service').html(option);
			    }
			};
			xhttp.open("POST", "{{url('api/get/service')}}", true);
			xhttp.send(formdata);
		});
	})();


	(()=>{
		$('#tax_id').on('keydown', ()=>{
			setTimeout(()=>{
				var formdata = new FormData();
				    formdata.append('tax_id', $('#tax_id').val());

				$('#customer_name').val('');
		    	$('#customer_type').val('');
		    	$('#telephone').val('');
		    	$('#date_of_birth').val('');

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200) {
				    	var customer = JSON.parse(xhttp.responseText);
				    	$('#customer_name').val((customer.type != "company" ? customer.customer_name : customer.company_name));
				    	$('#customer_type').val(customer.type);
				    	$('#telephone').val(customer.telephone);
				    	$('#date_of_birth').val(customer.date_of_birth);

				    	if(Object.values(customer).length > 0){
				    		$('#tax_id').css('border-color', 'green');
				    	}
				    	else {
				    		$('#tax_id').css('border-color', 'red');				    		
				    	}
				    }
				};
				xhttp.open("POST", "{{url('api/get/customer')}}", true);
				xhttp.send(formdata);
			}, 10);
		});
	})()
</script>
@endsection


@section('style')
<style>
	.custom-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.custom-btn {
	    border: 1px solid #ddd;
	    padding: 2px 7px;
	}
</style>
@endsection