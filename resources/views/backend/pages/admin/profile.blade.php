@extends('backend.layout.app')

@section('title', 'User Profile')

@section('content')
    
<div class="card card-custom" id="kt_page_sticky_card">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label"> {{ucfirst($admin->admin_type)}} Profile
			<i class="mr-2"></i>
			<!-- <small class="">try to scroll the page</small></h3> -->
		</div>
		<div class="card-toolbar">
			<a href="{{route('admin.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
			<i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
		</div>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-md-3 border-right">
				<div class="user-pic">
					<img src="{{asset($admin->img ?? 'public/images/004-boy-1.svg')}}">
				</div>
			</div>
			<div class="col-md-5">
				<table>
					<tr>
						<th>Username </th>
						<td>: {{$admin->username}}</td>
					</tr>

					<tr>
						<th>Name</th>
						<td>: {{$admin->name}}</td>
					</tr>

					<tr>
						<th>Mobile</th>
						<td>: {{$admin->mobile}}</td>
					</tr>

					<tr>
						<th>E-mail</th>
						<td>: {{$admin->email}}</td>
					</tr>

					<tr>
						<th>Address</th>
						<td>: {{$admin->address}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection


@section('style')
<style>
	.user-pic {
		border: 1px solid #f5f4f4;
	    height: 210px;
	    width: 210px;
	    overflow: hidden;
	}
	.user-pic img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
</style>
@endsection