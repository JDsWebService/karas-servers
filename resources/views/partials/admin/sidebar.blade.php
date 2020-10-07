{{-- Closed Sidebar Bars --}}
<a id="show-sidebar" class="btn btn-sm btn-light" href="#">
    <i class="fas fa-bars"></i>
</a>
{{-- Sidebar --}}
<nav id="sidebar" class="sidebar-wrapper">

    {{-- Sidebar Content --}}
    <div class="sidebar-content">

        {{-- Branding --}}
        <div class="sidebar-brand">
            <a href="{{ route('index') }}">{{ config('app.name', 'Laravel') }}</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>

        {{-- User Information --}}
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="{{ Auth::user()->avatar }}" alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->username }}</span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>

        {{-- Sidebar Menu --}}
        <div class="sidebar-menu">
            <ul>

                {{-- Header --}}
                <li class="header-menu">
                    <span>General</span>
                </li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-house-user"></i>
                        <span>Admin Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('index') }}">
                        <i class="fas fa-home"></i>
                        <span>Site Home</span>
                    </a>
                </li>

                {{-- Dropdown --}}
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                        {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users"></i> User Management
                                </a>
                            </li>
                            @superAdmin
                                <li>
                                    <a href="{{ route('admin.users.adminIndex') }}">
                                        <i class="fas fa-user-shield"></i> Admin Management
                                    </a>
                                </li>
                            @endsuperAdmin
                        </ul>
                    </div>
                </li>

                {{-- Dropdown --}}
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-server"></i>
                        <span>Servers</span>
                        {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.servers.index') }}">
                                    <i class="far fa-eye"></i> View All Servers
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.servers.add') }}">
                                    <i class="far fa-plus-square"></i> Add New Server
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-jedi"></i> Force Update
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Blog Dropdown --}}
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-blog"></i>
                        <span>Blog</span>
                        {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.blog.index') }}">
                                    <i class="far fa-eye"></i> View All Posts
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.create') }}">
                                    <i class="far fa-plus-square"></i> Create New Post
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Recipes Dropdown --}}
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-cookie-bite"></i>
                        <span>Recipes</span>
                        {{-- <span class="badge badge-pill badge-primary">3</span> --}}
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-book-open"></i> View All Recipes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.resources.ingredients.index') }}">
                                    <i class="fas fa-shopping-basket"></i> View All Ingredients
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Header --}}
                <li class="header-menu">
                    <span>Sidebar Header</span>
                </li>
                {{-- Menu Item w/o Dropdown --}}
                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Link</span>
                    </a>
                </li>

            </ul>
        </div> <!-- ./sidebar-menu  -->

    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">

        {{--
        <div class="dropdown">

            <a href="#" class="" id="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>

            <div class="dropdown-menu messages" aria-labelledby="test">
                <div class="messages-header">
                    <i class="fa fa-envelope"></i>
                    Messages
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <img src="assets/img/user.jpg" alt="">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                        </div>
                    </div>

                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#">View all messages</a>

            </div>
        </div>
        --}}

        {{-- Admin Settings --}}
        {{-- <div class="dropdown">
            <a href="#" class="" id="adminUserSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="adminUserSettings">
                <a class="dropdown-item" href="#">My profile</a>
                <a class="dropdown-item" href="#">Help</a>
                <a class="dropdown-item" href="#">Setting</a>
            </div>
        </div> --}}

        {{-- Logout --}}
        <div>
            <a href="{{ route('logout') }}">
                <i class="fa fa-power-off"></i>
            </a>
        </div>

    </div> <!-- /.sidebar-footer -->

</nav>
