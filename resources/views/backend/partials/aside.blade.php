<style type="text/css">
	li.active .menu-text {
		color : #007bff!important;
	}
</style>
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    
	<div class="brand flex-column-auto" id="kt_brand">
	<!--begin::Logo-->
		<a href="{{route('admin.dashboard')}}" class="brand-logo">
		  <img alt="Logo" src="{{asset(settings()->logo ?? 'public/images/ms.png')}}" style="height:60px;" />
		</a>
		<!--end::Logo-->
		<!--begin::Toggle-->
		<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
		  <span class="svg-icon svg-icon svg-icon-xl">
		    <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Text/Toggle-Right.svg-->
		    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		        <rect x="0" y="0" width="24" height="24" />
		        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z" fill="black" />
		        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z" fill="black" />
		      </g>
		    </svg>
		    <!--end::Svg Icon-->
		  </span>
		</button>
		<!--end::Toolbar-->
	</div>

<!--begin::Aside Menu-->
	<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
		<!--begin::Menu Container-->
		<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
		  <!--begin::Menu Nav-->
		<ul class="menu-nav">
		    <li class="menu-item {{Route::is('admin.dashboard') ? 'active' : ''}}" aria-haspopup="true">
		      <a href="{{route('admin.dashboard')}}" class="menu-link">
		        <span class="svg-icon menu-icon">
		          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
		          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		              <polygon points="0 0 24 0 24 24 0 24" />
		              <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
		              <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
		            </g>
		          </svg>
		          <!--end::Svg Icon-->
		        </span>
		        <span class="menu-text">Dashboard</span>
		      </a>
		    </li>


		    <li class="menu-item menu-item-submenu {{(Route::is('category.create') || Route::is('category.index')) ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
		      <a href="javascript:;" class="menu-link menu-toggle">
		        <span class="svg-icon menu-icon">
		          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
		          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		              <rect x="0" y="0" width="24" height="24" />
		              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
		              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
		            </g>
		          </svg>
		          <!--end::Svg Icon-->
		        </span>
		        <span class="menu-text">Category</span>
		        <i class="menu-arrow"></i>
		      </a>
		      <div class="menu-submenu">
		        <i class="menu-arrow"></i>
		        <ul class="menu-subnav">
		          <li class="menu-item menu-item-parent" aria-haspopup="true">
		            <span class="menu-link">
		              <span class="menu-text">Category</span>
		            </span>
		          </li>
		          <li class="menu-item {{Route::is('category.create')?'active':''}}" aria-haspopup="true">
		            <a href="{{route('category.create')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">New Category</span>
		            </a>
		          </li>
		          <li class="menu-item {{Route::is('category.index')?'active':''}}" aria-haspopup="true">
		            <a href="{{route('category.index')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">All Category</span>
		            </a>
		          </li>
		          
		        </ul>
		      </div>
		    </li>
		    

		    <li class="menu-item menu-item-submenu {{(Route::is('service.create') || Route::is('service.index')) ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
		      <a href="javascript:;" class="menu-link menu-toggle">
		        <span class="svg-icon menu-icon">
		          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
		          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		              <rect x="0" y="0" width="24" height="24" />
		              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
		              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
		            </g>
		          </svg>
		          <!--end::Svg Icon-->
		        </span>
		        <span class="menu-text">Services</span>
		        <i class="menu-arrow"></i>
		      </a>
		      <div class="menu-submenu">
		        <i class="menu-arrow"></i>
		        <ul class="menu-subnav">
		          <li class="menu-item menu-item-parent" aria-haspopup="true">
		            <span class="menu-link">
		              <span class="menu-text">Services</span>
		            </span>
		          </li>
		          <li class="menu-item {{Route::is('service.create')?'active':''}}" aria-haspopup="true">
		            <a href="{{route('service.create')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">New Services</span>
		            </a>
		          </li>
		          <li class="menu-item {{Route::is('service.index')?'active':''}}" aria-haspopup="true">
		            <a href="{{route('service.index')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">All Services</span>
		            </a>
		          </li>
		          
		        </ul>
		      </div>
		    </li>

		    <li class="menu-item menu-item-submenu {{(Route::is('admin.customer.index') || Route::is('admin.customer.files') || Route::is('admin.customer.file.edit') || Route::is('admin.customer.movements')) ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
		      <a href="javascript:;" class="menu-link menu-toggle">
		        <span class="svg-icon menu-icon">
		          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
		          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		              <rect x="0" y="0" width="24" height="24" />
		              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
		              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
		            </g>
		          </svg>
		          <!--end::Svg Icon-->
		        </span>
		        <span class="menu-text">Customer</span>
		        <i class="menu-arrow"></i>
		      </a>
		      <div class="menu-submenu">
		        <i class="menu-arrow"></i>
		        <ul class="menu-subnav">
		          <li class="menu-item menu-item-parent" aria-haspopup="true">
		            <span class="menu-link">
		              <span class="menu-text">Customer</span>
		            </span>
		          </li>

		          <li class="menu-item {{Route::is('admin.customer.index')?'active':''}}" aria-haspopup="true">
		            <a href="{{route('admin.customer.index')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">All Customer</span>
		            </a>
		          </li>

		          <li class="menu-item {{(Route::is('admin.customer.files') || Route::is('admin.customer.file.edit')) ?'active':''}}" aria-haspopup="true">
		            <a href="{{route('admin.customer.files')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">Files</span>
		            </a>
		          </li>

		          <li class="menu-item {{Route::is('admin.customer.movements') ?'active':''}}" aria-haspopup="true">
		            <a href="{{route('admin.customer.movements')}}" class="menu-link">
		              <i class="menu-bullet menu-bullet-dot">
		                <span></span>
		              </i>
		              <span class="menu-text">Movements</span>
		            </a>
		          </li>
		          
		        </ul>
		      </div>
		    </li>
		    @if(Auth::guard('admin')->user()->admin_type=='superadmin')

		    <li class="menu-item menu-item-submenu {{(Route::is('admin.privilege.status')) ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
		      <a href="javascript:;" class="menu-link menu-toggle">
		        <span class="svg-icon menu-icon">
		          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
		          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		              <rect x="0" y="0" width="24" height="24" />
		              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
		              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
		            </g>
		          </svg>
		          <!--end::Svg Icon-->
		        </span>
		        <span class="menu-text">Permission</span>
		        <i class="menu-arrow"></i>
		      </a>

				<div class="menu-submenu">
					<i class="menu-arrow"></i>
					<ul class="menu-subnav">
					  <li class="menu-item menu-item-parent" aria-haspopup="true">
					    <span class="menu-link">
					      <span class="menu-text">Permission</span>
					    </span>
					  </li>

					  <li class="menu-item {{Route::is('admin.privilege.status')?'active':''}}" aria-haspopup="true">
					    <a href="{{route('admin.privilege.status')}}" class="menu-link">
					      <i class="menu-bullet menu-bullet-dot">
					        <span></span>
					      </i>
					      <span class="menu-text">Status Permission</span>
					    </a>
					  </li>

					</ul>
				</div>
		    </li>


		    <li class="menu-item menu-item-submenu {{(Route::is('admin.index') || Route::is('admin.create')) ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
				<a href="javascript:;" class="menu-link menu-toggle">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
			          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
			            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			              <rect x="0" y="0" width="24" height="24" />
			              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
			              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
			            </g>
			          </svg>
			          <!--end::Svg Icon-->
					</span>
					<span class="menu-text">Admin</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="menu-submenu">
					<i class="menu-arrow"></i>
					<ul class="menu-subnav">
						<li class="menu-item menu-item-parent" aria-haspopup="true">
							<span class="menu-link">
								<span class="menu-text">Admin</span>
							</span>
						</li>

						<li class="menu-item {{Route::is('admin.create') ? 'active' : ''}}" aria-haspopup="true">
							<a href="{{route('admin.create')}}" class="menu-link">
								<i class="menu-bullet menu-bullet-dot">
									<span></span>
								</i>
								<span class="menu-text">New Admin</span>
							</a>
						</li>

						<li class="menu-item {{Route::is('admin.index') ? 'active' : ''}}" aria-haspopup="true">
							<a href="{{route('admin.index')}}" class="menu-link">
								<i class="menu-bullet menu-bullet-dot">
									<span></span>
								</i>
								<span class="menu-text">All Admin</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		    
		    
		    <li class="menu-item menu-item-submenu {{(Route::is('admin.user.create') || Route::is('admin.user.all')) ? 'menu-item-open' : ''}}" aria-haspopup="true" data-menu-toggle="hover">
			    <a href="javascript:;" class="menu-link menu-toggle">
			        <span class="svg-icon menu-icon">
			          <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
			          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
			            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			              <rect x="0" y="0" width="24" height="24" />
			              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
			              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
			            </g>
			          </svg>
			          <!--end::Svg Icon-->
			        </span>
			        <span class="menu-text">User</span>
			        <i class="menu-arrow"></i>
			    </a>
				<div class="menu-submenu">
					<i class="menu-arrow"></i>
					<ul class="menu-subnav">
						<li class="menu-item menu-item-parent" aria-haspopup="true">
							<span class="menu-link">
							  <span class="menu-text">User</span>
							</span>
						</li>

						<li class="menu-item {{Route::is('admin.user.create') ? 'active' : ''}}" aria-haspopup="true">
							<a href="{{route('admin.user.create')}}" class="menu-link">
							  <i class="menu-bullet menu-bullet-dot"><span></span></i>
							  <span class="menu-text">New User</span>
							</a>
						</li>

						<li class="menu-item {{Route::is('admin.user.all') ? 'active' : ''}}" aria-haspopup="true">
							<a href="{{route('admin.user.all')}}" class="menu-link">
							  <i class="menu-bullet menu-bullet-dot"><span></span></i>
							  <span class="menu-text">All User</span>
							</a>
						</li>
					</ul>
				</div>
		    </li>

		    <li class="menu-item {{Route::is('admin.settings') ? 'active' : ''}}" aria-haspopup="true">
		      <a href="{{route('admin.settings')}}" class="menu-link">
		        <span class="svg-icon menu-icon">
		           <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
			          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
			            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			              <rect x="0" y="0" width="24" height="24" />
			              <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
			              <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
			            </g>
			          </svg>
			          <!--end::Svg Icon-->
		        </span>
		        <span class="menu-text">Settings</span>
		      </a>
		    </li>
		    
		    @endif
		 </ul>
		  <!--end::Menu Nav-->
		</div>
		<!--end::Menu Container-->
	</div>
<!--end::Aside Menu-->
</div>