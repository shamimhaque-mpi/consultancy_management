@extends('backend.layout.app')

@section('title', 'Set Permission')

@section('content')
    
	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<h3 class="card-label">Set Permission
				<i class="mr-2"></i>
				<!-- <small class="">try to scroll the page</small></h3> -->
			</div>
			<div class="card-toolbar">
				@if(!empty($admin))
				<div class="btn-group">
					<button  form="agent_from" type="submit" class="btn btn-primary font-weight-bolder">
					<i class="ki ki-check icon-sm"></i>Save</button>
				</div>
				@endif
			</div>
		</div>
		<div class="card-body">
			<!--begin::Form-->
			<form class="form" method="POST" action="">
				@csrf
				<div class="row">
					<div class="col-xl-1"></div>
					<div class="col-xl-8">
						<div class="my-5">
							
							<div class="form-group row">
								<label class="col-2 text-right">Admins</label>
								<div class="col-8">
									<select name="admin_id" class="form-control select2">
										<option value="">Select a Admin</option>
										@foreach($admins as $row)
										<option value="{{$row->id}}" {{(!empty($admin) && $admin->id == $row->id) ? 'selected' : ''}}>{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<label class="col-2">
									<input type="submit" name="filter" value="Filter" class="btn btn-info">
								</label>
							</div>
						</div>
					</div>
				</div>
			</form>

			@if(!empty($admin))

			<hr>

			<form method="POST" action="" id="agent_from" >
				@csrf
				@php
					$permission = json_decode(($admin->permission ?? ''), true);
					$permission = $permission ?? [];
				@endphp
				<input type="hidden" name="admin_id" value="{{$admin->id}}">
				<input type="hidden" name="save" value="yes">
				<div class="permission-area">
					<ul style="list-style: none">
						@foreach(config('app.status') as $value)
						<li><label><input type="checkbox" name="status[]" {{in_array($value, $permission) ? 'checked':''}} value="{{$value}}"> &nbsp; {{ucfirst($value)}}</label></li>
						@endforeach
					</ul>
				</div>	
			</form>
			@endif
			<!--end::Form-->
		</div>
	</div>
@endsection