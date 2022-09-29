<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('assets/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MNRE</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar4.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block h5"> {{auth()->user()->first_name . ' '.  auth()->user()->last_name}}</a>
          <div><small class="text-white"> {{ auth()->user()->email}} </small></div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard')}}" class="nav-link {{ $base_url === "dashboard" ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          
          <li class="nav-item {{ $base_url === "stationary" || $base_url === "department" ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ $base_url === "stationary" || $base_url === "department" ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('stationary')}}" class="nav-link {{ $base_url === "canteen" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Canteen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('department')}}" class="nav-link {{ $base_url === "department" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('order_request')}}" class="nav-link {{ $base_url === "dashboard1" ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p> Employee's Details </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('order_request_details')}}" class="nav-link {{ $base_url === "dashboard1" ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p> Item Request Details </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard')}}" class="nav-link {{ $base_url === "dashboard2" ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p> Audit History </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard')}}" class="nav-link {{ $base_url === "dashboard2" ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>Items </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>