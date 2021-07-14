@extends('backend.layout.app')

@section('title', 'All User')

@section('content')

	@if(session()->has('success'))
	<div class="alert alert-primary mt-4" role="alert">
	  {{session()->get('success')}}
	</div>
	@endif

	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<span class="card-icon">
					<!-- <i class="flaticon2-delivery-package text-primary"></i> -->
				</span>
				<h3 class="card-label">Client List</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<a href="{{route('admin.user.create')}}" class="btn btn-primary font-weight-bolder">
				<span class="svg-icon svg-icon-md">
					<!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<circle fill="#000000" cx="9" cy="15" r="6" />
							<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>New Record</a>
				<!--end::Button-->
			</div>
		</div>
		<div class="card-body">
			<!--begin: Search Form-->
			<form onsubmit="filter(event)" class="mb-15">
				<div class="row mb-6">
					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>Username:</label>
						<input type="text" id="username" class="form-control datatable-input" placeholder="E.G:baseit" />
					</div>
					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>Mobile:</label>
						<input type="text" id="mobile" class="form-control datatable-input" placeholder="E.G:+9087638343" />
					</div>
					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>Email:</label>
						<input type="text" id="email" class="form-control datatable-input" placeholder="E.G:example@example.com" />
					</div>

					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>&nbsp;</label>
						<div class="form-group">
							<div class="btn-group">
								<button class="btn btn-primary btn-primary--icon" id="kt_search">
									<span>
										<i class="la la-search"></i>
										<span>Search</span>
									</span>
								</button>&#160;&#160; 
								<button type="reset" class="btn btn-secondary btn-secondary--icon" id="kt_reset">
									<span>
										<i class="la la-close"></i>
										<span>Reset</span>
									</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--begin: Datatable-->
			<!--begin: Datatable-->
			<div class="data-table-wrapper">
				<table class="table table-bordered table-hover table-checkable" id="kt_datatable">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Username</th>
							<th>Mobile</th>
							<th>E-mail</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
			<!--end: Datatable-->
		</div>
	</div>
@endsection

@section('script')
<link href="{{url('public/backend/css')}}/datatables.bundle.css" rel="stylesheet" type="text/css" />
<script src="{{url('public/backend/js')}}/datatables.bundle.js"></script>

<!-- <script src="{{url('public/js')}}/advanced-search.js"></script> -->
<script type="text/javascript">
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
	function fetch_data ($data=null){
		var where = {
				url:"{{url('admin/user/get-all-users')}}",
				type:"POST",
			}

		if($data){
			where.data = $data;
		}


		var t = $("#kt_datatable").DataTable({
			responsive : !0,
			dom 	   : "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
			lengthMenu : [5,10,25,50],pageLength:2,
			language   : {lengthMenu:"Display _MENU_"},
			searchDelay: 500,processing:!0,
			serverSide : !0,
			ajax 	   : where,
			columns:[
				{data:"id"},
				{data:"name"},
				{data:"username"},
				{data:"mobile"},
				{data:"email"},
				{data:"address"},
				{data:"Actions",responsivePriority:-1}
			],
			initComplete:function(){
				this.api().columns().every((function(){
					var t=this;
				}))
			},
			columnDefs:
			[
				{
					targets:-1,
					title:"Actions",
					orderable:!1,
					render:function(t,a,e,l){
						return `
							<a href="{{route('admin.user.edit')}}/${e.id}" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
							<a href="{{route('admin.user.profile')}}/${e.id}" class="btn btn-sm btn-clean btn-icon" title="View Profile"><i class="la la-user"></i></a>
						`
					}
				}
			]
		});
	}
	fetch_data();

	function filter(event){
		event.preventDefault();

		var table_wrapper = document.querySelector('.data-table-wrapper');

		var username = $('#username').val();
		var moible 	 = $('#moible').val();
		var email 	 = $('#email').val();

		if(table_wrapper){
			table_wrapper.innerHTML = `
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable">
				<thead>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Username</th>
						<th>Mobile</th>
						<th>E-mail</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
			`;
		}

		var data = {
			username 	: username,
			moible 		: moible,
			email 		: email
		};

		setTimeout(function(){fetch_data(data);}, 10);
	}
</script>
@endsection