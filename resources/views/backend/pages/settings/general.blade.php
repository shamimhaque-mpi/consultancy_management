@extends('backend.layout.app')

@section('title', 'Settings')

@section('content')
    
	<!--begin::Card-->
	<div class="card card-custom card-sticky" id="kt_page_sticky_card">
		<div class="card-header">
			<div class="card-title">
				<h3 class="card-label">General Settings
				<i class="mr-2"></i>
			</div>

			<div class="card-toolbar">
				<div class="btn-group">
					<button  form="agent_from" type="submit" class="btn btn-primary font-weight-bolder">
					<i class="ki ki-check icon-sm"></i>Save</button>
				</div>
			</div>

		</div>
		<div class="card-body">
			<!--begin::Form-->
			<form class="form" id="agent_from" method="POST" action="" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-xl-2"></div>
					<div class="col-xl-8">
						<div class="my-5">

							<div class="form-group row">
								<label class="col-3">Company Name</label>
								<div class="col-9">
									<input type="text" name="company_name" value="{{$settings->company_name ?? ''}}" class="form-control form-control-solid" placeholder="Enter Company Name" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3">Mobile</label>
								<div class="col-9">
									<input type="text" name="company_mobile" value="{{$settings->company_mobile ?? ''}}" class="form-control form-control-solid" placeholder="Enter Company Mobile" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3">E-mail</label>
								<div class="col-9">
									<input type="text" name="company_email" value="{{$settings->company_email ?? ''}}" class="form-control form-control-solid" placeholder="Enter Company E-mail" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3">Address</label>
								<div class="col-9">
									<textarea name="company_address" class="form-control form-control-solid" placeholder="Enter Company Address" >{{$settings->company_address ?? ''}}</textarea>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3">Logo</label>
								<div class="col-9">
									<input type="file" name="logo" class="form-control form-control-solid"/>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-3">Fav-icon</label>
								<div class="col-9">
									<input type="file" name="fav_icon" class="form-control form-control-solid"/>
								</div>
							</div>

						</div>

						<div class="separator separator-dashed my-10"></div>
					</div>
					<div class="col-xl-2"></div>
				</div>
			</form>

			<div class="row">
				<div class="col-md-3">
					<h4>Logo</h4>
					<img src="{{asset($settings->logo)}}" style="width: 200px">
				</div>
				<div class="col-md-3">
					<h4>Fav Icon</h4>
					<img src="{{asset($settings->fav_icon)}}" style="width: 200px">
				</div>
			</div>



		</div>
	</div>
			
@endsection