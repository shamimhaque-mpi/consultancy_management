@extends('backend.layout.app')

@section('title', 'All Customer')

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
				<h3 class="card-label">Customer List</h3>
			</div>
		</div>
		<div class="card-body">
			<!--begin: Search Form-->
			<form onsubmit="filter(event)" class="mb-15">
				<div class="row mb-6">
					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>Customer Tax ID:</label>
						<input type="text" id="tax_id" class="form-control datatable-input" placeholder="E.G: KL52EH" />
					</div>
					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>City:</label>
						<input type="text" id="city" class="form-control datatable-input" placeholder="E.G: Naples" />
					</div>

					<div class="col-lg-3 mb-lg-0 mb-6">
						<label>Region:</label>
						<input type="text" id="region" class="form-control datatable-input" placeholder="E.G: Campania" />
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
							<th>Tax ID</th>
							<th>Customer Type</th>
							<th>Mobile</th>
							<th>Date Of Birth</th>
							<th>City</th>
							<th>Region</th>
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
			url  : "{{url('admin/customer/api_get_all')}}",
			type : "POST",
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
				{data:"tax_id"},
				{data:"type"},
				{data:"mobile"},
				{data:"date_of_birth"},
				{data:"city"},
				{data:"region"},
			],
			initComplete:function(){
				this.api().columns().every((function(){
					var t=this;
				}))
			}
		});
	}
	fetch_data();

	function filter(event){
		event.preventDefault();

		var table_wrapper = document.querySelector('.data-table-wrapper');

		var tax_id 		  = $('#tax_id').val();
		var city 	      = $('#city').val();
		var region 	      = $('#region').val();

		if(table_wrapper){
			table_wrapper.innerHTML = `
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable">
				<thead>
					<tr>
						<th>Tax ID</th>
						<th>Customer Type</th>
						<th>Mobile</th>
						<th>Date Of Birth</th>
						<th>City</th>
						<th>Region</th>
					</tr>
				</thead>
			</table>
			`;
		}

		var data = {
			tax_id 			: tax_id,
			city 			: city,
			region 			: region,
		};

		setTimeout(function(){fetch_data(data);}, 10);
	}
</script>
@endsection