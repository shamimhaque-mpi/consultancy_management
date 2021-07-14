@extends('frontend.layouts.app')


@section('title', 'Movement')

@section('content')
<nav aria-label="breadcrumbx" class="mt-2">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
    <li class="breadcrumb-item">Movements</li>
  </ol>
</nav>

<div class="customer-list">
	<div class="custom-header">
		<h3>Movements</h3>
	</div>
	<hr>
	<form method="POST" action="">
		@csrf
		<div class="row">
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
				<label>Tax ID</label>
				<div class="form-group">
					<input type="text" name="search[tax_id]" class="form-control">
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
				<th>Created Date</th>
				<th>Tax ID</th>
				<th>Customer Name</th>
				<th>Shop Name</th>
				<th>Service</th>
				<th class="text-right">Amount</th>
			</tr>
			@php $total = 0; @endphp
			@if(!$all_files->isEmpty()) @foreach($all_files as $row)
			@php $total += ($row->service->service_fee ?? 0); @endphp
			<tr>
				<td>{{$row->id}}</td>
				<td>{{$row->created_at}}</td>
				<td>{{$row->tax_id}}</td>
				<td>{{$row->customer->customer_name ?? 'Not Found'}}</td>
				<td>{{Auth::user()->name ?? 'N/A'}}</td>
				<td>{{$row->service->service_name ?? 'N/A'}}</td>
				<td class="text-right">{{$row->service->service_fee ?? 0}}</td>
			</tr>
			@endforeach @endif
			<tr>
				<th class="text-right" colspan="6">Total</th>
				<td class="text-right">{{number_format($total, 2)}}</td>
			</tr>
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
</style>
@endsection