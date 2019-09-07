<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
          <img src="{{ asset('bower_components/admin-lte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class=" glyphicon glyphicon-envelope "></i> 
          {{ Auth::user()->email }}
        </a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-rocket"></i> <span>Consignment</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('booking.create') }}"><i class="fa fa-angle-double-right"></i> Consignment Booking</a></li>
          <li><a href="{{ route('booking.index') }}"><i class="fa fa-angle-double-right"></i> Consignment List</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i> Consignment <abbr title="Acknowledgment">Ack</abbr></a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i> Consignment Advance</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-truck"></i> <span>Vehicle Hire Contract (VHC)</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-angle-double-right"></i> VHC Booking</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i> VHC List</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i> VHC Advance</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-file-text"></i> <span>Invoice</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-angle-double-right"></i> Prepare Invoice</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i> Invoice List</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('masters*') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-user"></i> <span>Masters</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->is('masters/customer*') ? 'active' : '' }}"><a href="{{ route('customer.index') }}"><i class="fa fa-angle-double-right"></i> Customer </a></li>
          <li class="{{ request()->is('masters/consignee*') ? 'active' : '' }}"><a href="{{ route('consignee.index') }}"><i class="fa fa-angle-double-right"></i> Consignee </a></li>
          <li class="{{ request()->is('masters/consignor*') ? 'active' : '' }}"><a href="{{ route('consignor.index') }}"><i class="fa fa-angle-double-right"></i> Consignor </a></li>
          <li class="{{ request()->is('masters/broker*') ? 'active' : '' }}"><a href="{{ route('broker.index') }}"><i class="fa fa-angle-double-right"></i> Broker </a></li>
          <li class="{{ request()->is('masters/vehicle_owner') || request()->is('masters/vehicle_owner/*') ? 'active' : '' }}"><a href="{{ route('vehicle_owner.index') }}"><i class="fa fa-angle-double-right"></i> Vehicle Owner </a></li>
          <li class="{{ request()->is('masters/vehicle') || request()->is('masters/vehicle/*') ? 'active' : '' }}"><a href="{{ route('vehicle.index') }}"><i class="fa fa-angle-double-right"></i> Vehicle </a></li>
          <li class="{{ request()->is('masters/driver*') ? 'active' : '' }}"><a href="{{ route('driver.index') }}"><i class="fa fa-angle-double-right"></i> Driver </a></li>
          <li class="{{ request()->is('masters/user*') ? 'active' : '' }}"><a href="{{ route('user.index') }}"><i class="fa fa-angle-double-right"></i> User </a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>