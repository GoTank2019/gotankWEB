<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('img/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"></li>

      <li>

         <a href="{{ url('beranda') }}">
            <i class="fa fa-dashboard"></i> Dashboard
            </a>

      </li>

      <li>
        <a href="{{ url('pesan') }}">
          <i class="fa fa-folder"></i>
          <span>Pesan</span>

        </a>
      </li>

      <li>
        <a href="{{ url('driver') }}">
          <i class="fa fa-truck"></i>
          <span>Supir</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
          <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>
