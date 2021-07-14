@extends('backend.layout.app')

@section('title', 'Add Category')

@section('content')
    
	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<h3 class="card-label">New Category
				<i class="mr-2"></i>
				<!-- <small class="">try to scroll the page</small></h3> -->
			</div>
			<div class="card-toolbar">
				<a href="{{route('category.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
				<i class="ki ki-long-arrow-back icon-sm"></i>All Category</a>
				<div class="btn-group">
					<button  form="agent_from" type="submit" class="btn btn-primary font-weight-bolder">
					<i class="ki ki-check icon-sm"></i>Save</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<!--begin::Form-->
			<form class="form" id="agent_from" method="POST" action="{{route('category.store')}}">
				@csrf
				<div class="row">
					<div class="col-xl-1"></div>
					<div class="col-xl-8">
						<div class="my-5">
							<!-- <h3 class="text-dark font-weight-bold mb-10">Employee Info:</h3> -->
							<div class="form-group row">
								<label class="col-3 text-right">Category Name</label>
								<div class="col-9">
									<input type="text" name="category_name" value="{{old('category_name')}}" class="@error('shop_name') is-invalid @enderror form-control form-control-solid" placeholder="Enter Category Name" required>
									@error('category_name')
									<div class="fv-plugins-message-container">
										<div data-field="category_name" data-validator="notEmpty" class="fv-help-block">{{ $message }}</div>
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