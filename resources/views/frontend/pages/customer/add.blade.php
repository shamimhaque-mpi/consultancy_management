@extends('frontend.layouts.app')


@section('title', 'Customer')

@section('content')
<nav aria-label="breadcrumbx" class="mt-2">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.customer.all')}}">Customer</a></li>
    <li class="breadcrumb-item">New</li>
  </ol>
</nav>

<div class="customer-list pb-5">
	<div class="custom-header">
		<h3>New Customer</h3>
	</div>
	<hr>
	<form method="POST" action="">
		@csrf
		<div class="row form-group">
			<div class="col-md-2">Tax ID</div>
			<div class="col-md-10">
				<input type="text" onkeyup="this.classList.remove('border-danger')" name="tax_id" value="{{old('tax_id')}}" class="form-control {{old('tax_id') ? 'border-danger':''}}" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Customer Type</div>
			<div class="col-md-10">
				<select name="type" class="form-control" onchange="changeType(this.value)" required>
					<option value="person" {{old('type')=='person' ? 'selected':''}}>Person</option>
					<option value="company" {{old('type')=='company' ? 'selected':''}}>Company</option>
				</select>
			</div>
		</div>

		<div id="customer">
			<div class="row form-group">
				<div class="col-md-2">First Name</div>
				<div class="col-md-10">
					<input type="text" name="first_name" value="{{old('first_name')}}" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-2">Last Name</div>
				<div class="col-md-10">
					<input type="text" name="last_name" value="{{old('last_name')}}" class="form-control">
				</div>
			</div>
		</div>

		<div class="row form-group d-none" id="company">
			<div class="col-md-2">Company Name</div>
			<div class="col-md-10">
				<input type="text" name="company_name" value="{{old('company_name')}}" class="form-control">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Telephone</div>
			<div class="col-md-10">
				<input type="text" name="telephone" value="{{old('telephone')}}" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Mobile</div>
			<div class="col-md-10">
				<input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Date Of Birth</div>
			<div class="col-md-10">
				<input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Place Of Birth</div>
			<div class="col-md-10">
				<input type="text" name="place_of_birth" value="{{old('place_of_birth')}}" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Citizenship</div>
			<div class="col-md-10">
				<input type="text" name="citizenship" value="{{old('citizenship')}}" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Address Line 1</div>
			<div class="col-md-10">
				<input type="text" name="address_line_one" value="{{old('address_line_one')}}" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Address Line 2</div>
			<div class="col-md-10">
				<input type="text" name="address_line_two" value="{{old('address_line_two')}}" class="form-control">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">City</div>
			<div class="col-md-10">
				<input type="text" name="city" value="{{old('city')}}" placeholder="City" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Region</div>
			<div class="col-md-10">
				<input type="text" name="region" value="{{old('region')}}" placeholder="Region" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2">Postcode</div>
			<div class="col-md-10">
				<input type="text" name="postcode" value="{{old('postcode')}}" placeholder="Postcode" class="form-control" required>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<input type="submit" value="Save" class="btn btn-primary">
			</div>		
		</div>
	</form>
</div>
@endsection


@section('style')
<style>
	.custom-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
</style>
@endsection


@section('script')
<script>
	function changeType(type){
		var customer = document.querySelector('#customer');
		var company = document.querySelector('#company');
		
		if(type=='company'){
			company.classList.remove('d-none');
			customer.classList.add('d-none');
		}
		else if(type=='person'){
			company.classList.add('d-none');
			customer.classList.remove('d-none');
		}

	}

	@if(old('type'))
		changeType("{{old('type')}}")
	@endif
</script>


@endsection


