@extends('frontend.layouts.app')


@section('title', 'Customer')

@section('content')
<nav aria-label="breadcrumbx" class="mt-2">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
    <li class="breadcrumb-item">Customers</li>
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
		<h3>Customer List</h3>
		<a href="{{route('user.customer.add')}}" class="btn btn-success">Add New</a>
	</div>
	<hr>
	<form method="POST" action="">
		@csrf
		<div class="row">
			<div class="col-md-3">
				<label>Type</label>
				<div class="form-group">
					<select name="search[type]" class="form-control">
						<option value="">--Select type--</option>
						<option value="person">Person</option>
						<option value="company">Company</option>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<label>Tax ID</label>
				<div class="form-group">
					<input type="text" name="search[tax_id]" class="form-control">
				</div>
			</div>

			<div class="col-md-3">
				<label>Name</label>
				<div class="form-group">
					<input type="text" name="search[name]" class="form-control">
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
				<th>Type</th>
				<th>Tax ID</th>
				<th>Name</th>
				<th width="60">Action</th>
			</tr>
			@if(!$customers->isEmpty()) @foreach($customers as $row)
			<tr>
				<td>{{$row->id}}</td>
				<td>{{ucfirst($row->type)}}</td>
				<td>{{$row->tax_id}}</td>
				<td>{{$row->type=='person' ? $row->customer_name : $row->company_name}}</td>
				<td>
					<div class="btn-group">
						<a href="{{route('user.customer.edit', $row->id)}}" title="Edit" class="custom-btn btn">
							Edit
						</a>
					</div>
				</td>
			</tr>
			@endforeach @endif
		</table>
	</div>
</div>
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