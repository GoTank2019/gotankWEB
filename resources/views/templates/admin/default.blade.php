
<!DOCTYPE html>
<html>
@include('templates.admin.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('templates.admin.partials._header')
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('templates.admin.partials._sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('templates.admin.partials._footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
@include('templates.admin.partials._script')
</body>
</html>
