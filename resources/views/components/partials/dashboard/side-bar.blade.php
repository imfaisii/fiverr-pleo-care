<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 97%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li @if (checkStatus('dashboard')) class='active' @endif>
                        <a href="{{ route('dashboard') }}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @role(\App\Constants\Constant::SUPER_ADMIN)
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="airplay"></i>
                                <span>Companies</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('companies.create')) class='active' @endif>
                                    <a href="{{ route('companies.create') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create New
                                    </a>
                                </li>
                                <li @if (checkStatus('companies.list')) class='active' @endif><a
                                        href="{{ route('companies.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Listings
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="shield"></i>
                                <span>Roles & Permissions</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('roles')) class='active' @endif>
                                    <a href="{{ route('roles') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Roles
                                    </a>
                                </li>
                                <li @if (checkStatus('permissions')) class='active' @endif>
                                    <a href="{{ route('permissions') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Permissions
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role(\App\Constants\Constant::COMPANY)
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="users"></i>
                                <span>Managers</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('managers.list')) class='active' @endif><a
                                        href="{{ route('managers.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create & Listings
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="thumbs-up"></i>
                                <span>Job Roles</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('job-roles.create')) class='active' @endif>
                                    <a href="{{ route('job-roles.create') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create New
                                    </a>
                                </li>
                                <li @if (checkStatus('job-roles.list')) class='active' @endif><a
                                        href="{{ route('job-roles.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Listings
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role(\App\Constants\Constant::MANAGER)
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="users"></i>
                                <span>Employees</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('employees.create')) class='active' @endif>
                                    <a href="{{ route('employees.create') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create New
                                    </a>
                                </li>
                                <li @if (checkStatus('employees.list')) class='active' @endif><a
                                        href="{{ route('employees.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Listings
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i data-feather="user-plus"></i>
                                <span>Clients</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('clients.create')) class='active' @endif>
                                    <a href="{{ route('clients.create') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create New
                                    </a>
                                </li>
                                <li @if (checkStatus('clients.list')) class='active' @endif><a
                                        href="{{ route('clients.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Listings
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i data-feather="calendar"></i>
                                <span>Shifts Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('shifts.create')) class='active' @endif>
                                    <a href="{{ route('shifts.create') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create New
                                    </a>
                                </li>
                                <li @if (checkStatus('shifts.list')) class='active' @endif><a
                                        href="{{ route('shifts.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Listings
                                    </a>
                                </li>
                                <li @if (checkStatus('shifts.proposals')) class='active' @endif><a
                                        href="{{ route('shifts.proposals') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Proposals
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role(\App\Constants\Constant::EMPLOYEE)
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="calendar"></i>
                                <span>Shifts</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li @if (checkStatus('employees.shifts.view')) class='active' @endif>
                                    <a href="{{ route('employees.shifts.view') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Listings
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                </ul>
            </div>
        </div>
    </section>
</aside>
