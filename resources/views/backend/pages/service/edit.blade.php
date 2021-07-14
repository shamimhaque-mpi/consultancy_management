@extends('backend.layout.app')

@section('title', 'Edit Service')

@section('content')
    
	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<h3 class="card-label">Edit Service
				<i class="mr-2"></i>
				<!-- <small class="">try to scroll the page</small></h3> -->
			</div>
			<div class="card-toolbar">
				<a href="{{route('service.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
				<i class="ki ki-long-arrow-back icon-sm"></i>All Service</a>
				<div class="btn-group">
					<button  form="agent_from" type="submit" class="btn btn-primary font-weight-bolder">
					<i class="ki ki-check icon-sm"></i>Update</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<!--begin::Form-->
			<form class="form" id="agent_from" method="POST" action="{{route('service.update', $service->id)}}">
				@csrf
				<div class="row">
					<div class="col-xl-1"></div>
					<div class="col-xl-8">
						<div class="my-5">

							<div class="form-group row">
								<label class="col-3 text-right">Category</label>
								<div class="col-9">
									<select name="cat_id" class="form-control" required>
										<option value="">Select A Category</option>
										@if($categories) @foreach($categories as $row)
										<option value="{{$row->id}}" {{($service->cat_id==$row->id) ? 'selected' : ''}}>{{$row->category_name}}</option>
										@endforeach @endif
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3 text-right">Service Name</label>
								<div class="col-9">
									<input type="text" name="service_name" value="{{$service->service_name}}" class="form-control form-control-solid" placeholder="Enter Service Name" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3 text-right">Service Fee</label>
								<div class="col-9">
									<input type="number" name="service_fee" class="form-control form-control-solid" placeholder="Enter Service Fee" value="{{$service->service_fee}}" required>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-2"></div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
@endsection