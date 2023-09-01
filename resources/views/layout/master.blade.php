<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
  @include('layout.head')

  <link
      href="{{ URL::asset('assets/css/dataTables.bootstrap4.css') }}"
      rel="stylesheet"
    />
  </head>

  <body>

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

      <header class="topbar" data-navbarbg="skin5">
        @include('layout.navbar')
      </header>

      @include('layout.aside')
      
      <div class="page-wrapper">
        <!-- Bread crumb -->
        @yield('bread_crumb')
        <!-- end Bread crumb -->
      </div>
      
       <!-- Container fluid -->
       <div class="container-fluid">
        <!-- Start Page Content -->
        @yield('content')
        <!-- Start Page Content -->
       </div>
       <!-- end Container fluid -->


      
       @include('layout.js')
       <script src="{{ url::asset('assets/js/datatables.min.js')}}"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
</script>
    </body>
  </html>