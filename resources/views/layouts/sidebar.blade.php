<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="treeview">
                <a href="#"><i class="fa fa-share"></i> <span>Companies</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('company.report.index')}}">List Companies</a></li>
                    <li><a href="{{ route('company.report.create') }}">Create a new company</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-share"></i> <span>Departments</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('department.report.index')}}">List Departments</a></li>
                    <li><a href="{{ route('department.report.create') }}">Create a new department</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-share"></i> <span>Branches</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('branch.report.index')}}">List Branches</a></li>
                    <li><a href="{{ route('branch.report.create') }}">Create a new branch</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-share"></i> <span>Employees</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('employee.report.index')}}">List Employees</a></li>
                    <li><a href="{{ route('employee.report.create') }}">Create a new employee</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-share"></i> <span>Candidates</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('candidate.report.index')}}">List Candidates</a></li>
                    <li><a href="{{ route('candidate.report.create') }}">Create a new candidate</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-share"></i> <span>Titles</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('title.report.index')}}">List Titles</a></li>
                    <li><a href="{{ route('title.report.create') }}">Create a new title</a></li>
                </ul>
            </li>
        </ul>
        <li></li>
        <li><a href="/tasks"><i class="fa fa-edit"></i> <span>Tasks</span></a></li>
        <li></li>
        <li><a href="/reports"><i class="fa fa-edit"></i> <span>Reports</span></a></li>
        <li></li>
        <li><a href="/projects/chart"><i class="fa fa-edit"></i> <span>Charts</span></a></li>
        <li></li>
        <li><a href="{{route('email.index')}}" ><i class="fa fa-envelope"></i> <span>Emails</span></a></li>
        <li><a href="{{route('check.index')}}" ><i class="fa fa-envelope"></i> <span>Check</span></a></li>

    </section>
</aside>