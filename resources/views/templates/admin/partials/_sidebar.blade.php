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
          <a href="{{url('admin/beranda')}}">
            <i class="fa fa-dashboard"></i> 
            Dashboard
          </a>
      </li>

      <li>
          <a href="{{url('admin/user')}}">
            <i class="fa fa-users"></i>
            <span>Data User</span>
          </a>
        </li>

      <li>
          <a href="{{url('admin/company')}}">
              <i class="fa fa-truck"></i>
              <span>Data Company</span>
          </a>
        </li>

      <li>
        <a href="{{ url('admin/pesan') }}">
          <i class="fa fa-folder"></i>
          <span>Data Pesan</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admin/jam') }}">
          <i class="fa fa-clock-o"></i>
          <span>Data Jam</span>
        </a>
      </li>

      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
          <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li> --}}

  </section>
  <!-- /.sidebar -->
</aside>