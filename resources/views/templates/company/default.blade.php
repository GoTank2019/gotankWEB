<!DOCTYPE html>
<html>
@include('templates.company.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
      
  @include('templates.company.partials._header')
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('templates.company.partials._sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('message'))
                <div class="box-body">
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      &times;
                    </button>
                    <h4>
                      <i class="icon fa fa-check"></i>
                      Sukses !!!
                    </h4>
                    {{ session('message') }}
                  </div>
                </div>
                @endif
    
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('templates.company.partials._footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
@include('templates.company.partials._script')
</body>
</html>
