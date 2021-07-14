@extends('backend.layout.app')

@section('title', 'Add User')

@section('content')
    
	@if(session()->has('success'))
	<div class="alert alert-primary mt-4" role="alert">
	  {{session()->get('success')}}
	</div>
	@endif
	
	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<h3 class="card-label">New User
				<i class="mr-2"></i>
				<!-- <small class="">try to scroll the page</small></h3> -->
			</div>
			<div class="card-toolbar">
				<a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
				<i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
				<div class="btn-group">
					<button  form="agent_from" type="submit" class="btn btn-primary font-weight-bolder">
					<i class="ki ki-check icon-sm"></i>Save</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<!--begin::Form-->
			<form class="form" id="agent_from" method="POST" action="">
				@csrf
				<div class="row">
					<div class="col-xl-1"></div>
					<div class="col-xl-8">
						<div class="my-5">
							<!-- <h3 class="text-dark font-weight-bold mb-10">Employee Info:</h3> -->
							<div class="form-group row">
								<label class="col-3 text-right">Name</label>
								<div class="col-9">
									<input type="text" name="name" value="{{old('name')}}" class="@error('name') is-invalid @enderror form-control form-control-solid" placeholder="Enter Your Full Name" required>
								</div>
								
							</div>
							<div class="form-group row">
								<label class="col-3 text-right">Address</label>
								<div class="col-9">
									<input type="text" name="address" class="form-control form-control-solid" placeholder="Adresss" value="{{old('address')}}" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-3 text-right">Mobile</label>
								<div class="col-9">
									<div class="input-group input-group-solid">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-phone"></i>
											</span>
										</div>
										<input name="mobile" type="text" class="@error('mobile') is-invalid @enderror form-control form-control-solid" value="{{old('mobile')}}" placeholder="Mobile Number" required>
										@error('mobile')
										<div class="fv-plugins-message-container">
											<div data-field="mobile" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
										</div>
										@enderror
									</div>
									<span class="form-text text-muted">We'll never share your email with anyone else.</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-3 text-right">Email Address</label>
								<div class="col-9">
									<div class="input-group input-group-solid">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-at"></i>
											</span>
										</div>
										<input name="email" type="email" class="@error('email') is-invalid @enderror form-control form-control-solid" value="{{old('email')}}" placeholder="Email" required>
										@error('email')
										<div class="fv-plugins-message-container">
											<div data-field="client_mobile" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
										</div>
										@enderror
									</div>
								</div>
							</div>
							
						</div>
						<div class="separator separator-dashed my-10"></div>
						
						<div class="form-group row">
							<label class="col-3 text-right">Username</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input name="username" type="text" class="form-control form-control-solid" value="{{old('username')}}" placeholder="Username" required>
									@error('username')
									<div class="fv-plugins-message-container">
										<div data-field="username" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
									</div>
									@enderror
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-3 text-right">Password</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input name="password" type="password" class="form-control form-control-solid" placeholder="Password" required>
									@error('password')
									<div class="fv-plugins-message-container">
										<div data-field="password" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
									</div>
									@enderror
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-3 text-right">Confirm Password</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input name="confirm_password" type="password" class="form-control form-control-solid" placeholder="Confirm Password" required>
									@error('confirm_password')
									<div class="fv-plugins-message-container">
										<div data-field="confirm_password" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
									</div>
									@enderror
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