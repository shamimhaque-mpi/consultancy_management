
@extends('backend.layout.app')

@section('title', 'All Admin')

@section('content')
    

@if(session()->has('success'))
<div class="alert alert-primary mt-4" role="alert">
  {{session()->get('success')}}
</div>
@endif
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon">
				<!-- <i class="flaticon2-delivery-package text-primary"></i> -->
			</span>
			<h3 class="card-label">Admin List</h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
			<div class="dropdown dropdown-inline mr-2">
				<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="svg-icon svg-icon-md">
					<!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
							<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>Export</button>
			</div>
			<!--end::Dropdown-->
			<!--begin::Button-->
			<a href="{{route('admin.create')}}" class="btn btn-primary font-weight-bolder">
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
					<label>Name:</label>
					<input type="text" id="name" class="form-control datatable-input" data-col-index="1" />
				</div>
				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Username:</label>
					<input type="text" id="username" class="form-control datatable-input" data-col-index="1" />
				</div>
				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Mobile:</label>
					<input type="text" id="mobile" class="form-control datatable-input" data-col-index="2" />
				</div>
				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>E-mail:</label>
					<input type="text" id="email" class="form-control datatable-input" data-col-index="3" />
				</div>
			</div>

			<div class="row mb-8">
				<div class="col-lg-3 mb-lg-0 mb-6">
					<label>Type:</label>
					<select id="admin_type" class="form-control datatable-input" data-col-index="4">
						<option value="">Select Type</option>
						<option value="superadmin">Superadmin</option>
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</div>
			</div>

			<div class="row mt-8">
				<div class="col-lg-12">
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
		</form>
		<!--begin: Datatable-->
		<div class="data-table-wrapper">
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Address</th>
						<th>Type</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
		</div>
		<!--end: Datatable-->
	</div>
</div>
<!--end::Card-->
@endsection

@section('script')
<link href="{{url('public/backend/css')}}/datatables.bundle.css" rel="stylesheet" type="text/css" />
<script src="{{url('public/backend/js')}}/datatables.bundle.js"></script>

<script type="text/javascript">
	function fetch_data ($data=null){
		var where = {
				url:"{{url('admin/api/all')}}",
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
				{data:"username"},
				{data:"name"},
				{data:"email"},
				{data:"mobile"},
				{data:"address"},
				{data:"type"},
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
							<a href="{{route('admin.edit')}}/${e.id}" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
							<a href="{{route('admin.profile')}}/${e.id}" class="btn btn-sm btn-clean btn-icon" title="User Profile"><i class="la la-user"></i></a>
						`
					}
				},
				{
					targets:5,
					render:function(t,a,e,l){
						var i={
							1:{title:"Active",class:"label-light-primary"},
							0:{title:"InActive",class:" label-light-danger"},
						};
						return void 0===i[t]?t:'<span class="label label-lg font-weight-bold'+i[t].class+' label-inline">'+i[t].title+"</span>"
					}
				}
			]
		});
	}
	fetch_data();

	function filter(event){
		event.preventDefault();

		var table_wrapper = document.querySelector('.data-table-wrapper');

		var username 		= $('#username').val();
		var name 		= $('#name').val();
		var mobile 		= $('#mobile').val();
		var email 		= $('#email').val();
		var admin_type 	= $('#admin_type').val();

		if(table_wrapper){
			table_wrapper.innerHTML = `
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Address</th>
						<th>Type</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
			`;
		}

		var data = {
			username 	: username,
			name 	 	: name,
			mobile 	 	: mobile,
			admin_type 	: admin_type,
			email 	 	: email
		};

		setTimeout(function(){fetch_data(data);}, 10);
	}

	function topup(x){
		var data = JSON.parse(x);

		$('#modal_status').val(data[0]);
		$('#modal_client_id').val(data[1]);

		console.log(data);
	}
	//console.log(t.column(3).header().text());
</script>
@endsection