<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin') }}/dist/img/avatar2.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ url('/home') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Dashboard</span></a></li>
            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> All Users</a></li>
                    <li><a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i> Add new user</a></li>
                </ul>
            </li>--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope-o"></i> <span>Mail</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all-mail') }}"><i class="fa fa-circle-o"></i> All Send Mails</a></li>
                    <li><a href="{{ route('send-mail') }}"><i class="fa fa-circle-o"></i> Send New Mail</a></li>
                </ul>
            </li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out text-aqua"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
