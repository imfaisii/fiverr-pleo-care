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
                                <li @if (checkStatus('employees.list')) class='active' @endif><a
                                        href="{{ route('employees.list') }}">
                                        <i class="icon-Commit">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Create & Listings
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
