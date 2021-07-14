@extends('backend.layout.app')

@section('title', 'Dashboard')

@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
      <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
          <!--begin::Page Heading-->
          <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold my-1 mr-5">Aside Light</h5>
            <!--end::Page Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Themes</a>
              </li>
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Light Aside</a>
              </li>
            </ul>
            <!--end::Breadcrumb-->
          </div>
          <!--end::Page Heading-->
        </div>

      </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">

          <div class="col-lg-4">
            <!--begin::Stats Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                  <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Total Customer</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin::label-->
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$total_customar}}</span>
                <!--end::label-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Stats Widget 3-->
          </div>

          <div class="col-lg-4">
            <!--begin::Stats Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                  <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Total File</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin::label-->
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$total_file}}</span>
                <!--end::label-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Stats Widget 3-->
          </div>

          <div class="col-lg-4">
            <!--begin::Stats Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                  <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Total Service</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin::label-->
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$total_service}}</span>
                <!--end::label-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Stats Widget 3-->
          </div>

          <div class="col-lg-4">
            <!--begin::Stats Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                  <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Total Category</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin::label-->
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$total_category}}</span>
                <!--end::label-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Stats Widget 3-->
          </div>

          <div class="col-lg-4">
            <!--begin::Stats Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                  <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Total User</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin::label-->
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$total_user}}</span>
                <!--end::label-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Stats Widget 3-->
          </div>

          <div class="col-lg-4">
            <!--begin::Stats Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
              <!--begin::Header-->
              <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                  <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Total Admin</span>
                </h3>
              </div>
              <!--end::Header-->
              <!--begin::Body-->
              <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin::label-->
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$total_admin}}</span>
                <!--end::label-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Stats Widget 3-->
          </div>

        </div>

      </div>
      <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection