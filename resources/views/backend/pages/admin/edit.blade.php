
@extends('backend.layout.app')

@section('title', 'Add Category')

@section('content')
    
<!--begin::Card-->
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Edit Admin
			<i class="mr-2"></i>
			<!-- <small class="">try to scroll the page</small></h3> -->
		</div>
		<div class="card-toolbar">
			<a href="{{route('admin.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
			<i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

			<div class="btn-group">
				<button  form="agent_from" type="submit" class="btn btn-primary font-weight-bolder">
				<i class="ki ki-check icon-sm"></i>Save</button>
				<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<!--begin::Form-->
		<form class="form" id="agent_from" method="POST" action="{{route('admin.update', $admin->id)}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-xl-2"></div>
				<div class="col-xl-8">
					<div class="my-5">

						<div class="form-group row">
							<label class="col-3">Full Name</label>
							<div class="col-9">
								<input class="@error('name') is-invalid @enderror form-control form-control-solid" type="text" name="name" value="{{old('name') ?? $admin->name}}" placeholder="Full Name" required>
								@error('name')
								<div class="fv-plugins-message-container">
									<div data-field="name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">Mobile</label>
							<div class="col-9">
								<input class="@error('mobile') is-invalid @enderror form-control form-control-solid" type="text" name="mobile" value="{{old('mobile') ?? $admin->mobile}}" placeholder="Mobile No" required>
								@error('mobile')
								<div class="fv-plugins-message-container">
									<div data-field="mobile" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">E-mail</label>
							<div class="col-9">
								<input class="@error('email') is-invalid @enderror form-control form-control-solid" type="text" name="email" value="{{old('email') ?? $admin->email}}" placeholder="E-mail Address" required>
								@error('email')
								<div class="fv-plugins-message-container">
									<div data-field="email" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">Address</label>
							<div class="col-9">
								<textarea class="form-control form-control-solid" name="address" placeholder="Address" />{{old('address') ?? $admin->address}}</textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">Type</label>
							<div class="col-9">
								<select name="admin_type" class="form-control form-control-solid">
									<option value="superadmin" {{$admin->admin_type=='superadmin'?'selected':''}} >Superadmin</option>
									<option value="admin" {{$admin->admin_type=='admin'?'selected':''}} >Admin</option>
									<option value="user" {{$admin->admin_type=='user'?'selected':''}} >User</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">Photo</label>
							<div class="col-9">
								<input type="file" name="img" class="form-control form-control-solid">
							</div>
						</div>

						<hr>

						<div class="form-group row">
							<label class="col-3">Username</label>
							<div class="col-9">
								<input type="text" class="@error('username') is-invalid @enderror form-control form-control-solid" value="{{$admin->username}}" placeholder="Username" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">Password</label>
							<div class="col-9">
								<input type="password" class="form-control form-control-solid" name="password" placeholder="Password">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-3">Confirm Password</label>
							<div class="col-9">
								<input type="password" class="@error('confirm_password') is-invalid @enderror form-control form-control-solid" name="confirm_password" placeholder="Password">
								@error('confirm_password')
								<div class="fv-plugins-message-container">
									<div data-field="confirm_password" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
								</div>
								@enderror
							</div>
						</div>

					</div>
					<div class="separator separator-dashed my-10"></div>
				
				</div>
				<div class="col-xl-2"></div>
			</div>
		</form>
		<!--end::Form-->
	</div>
</div>
<!--end::Card-->


@endsection
@section('script')
<script src="{{url('public/js')}}/form-controls.js"></script>
@endsection