<html lang="en">
  <!--begin::Head-->
  <head>
    <!-- Google Tag Manager -->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8" />
    <title>{{settings()->company_name}} | @yield('title')</title>
    <meta name="description" content="Aside light theme example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <meta name="csrf-token" content="NySK5UoiQ0TZ63d5RTIldO90a4S9wJwKWinZNHEy" />
    <link rel="icon" href="{{asset(settings()->fav_icon)}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('backend.partials.header')

    @yield('style')
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
   
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <a style="height:100%" href="http://localhost/realstate_management">
            <img style="height:100%" alt="Logo" src="http://localhost/realstate_management/public/images/logo.png" />
        </a>
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
            <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
              <span class="svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/General/User.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                  </g>
                </svg>
              </span>
            </button>
        </div>
    </div>
    <!--end::Header Mobile-->   
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            @include('backend.partials.aside')
            <!--end::Aside-->       <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                  <!--begin::Header-->
                    @include('backend.partials.nav')
                    @include('backend.partials.quick_view')
                    <!--end::Header-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                      <div class="container mt-4">
                        @yield('content')
                      </div>
                    </div>
                    <!--end::Content-->
                </div>
            @include('backend.partials.footer')
        </div>
    </div>
    <script>
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
      $(".select2").select2();
    </script>
    @yield('script')
    </body>
  <!--end::Body-->
</html>