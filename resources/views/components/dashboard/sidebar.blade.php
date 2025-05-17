<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link d-inline-block">
        <img src="{{ asset('image/logo.jpg') }}" alt="National Care Group" class="brand-image elevation-2 rounded-full"
            style="opacity: .8;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar w-100">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                {{-- <img src="{{ asset('image/user/') }}"class="img-circle elevation-2" alt="Profile Image"> --}}
                <img src="{{ asset(auth()->user()->image) }}" class="img-circle "
                    style="width: 40px;
                height: 40px; border-radius: 50%; object-fit: cover;"
                    alt="Profile Image">

            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">

                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>



                <li
                    class="nav-item {{ Route::is('products.index') || Route::is('products.*') || Route::is('productCategories.*') ? 'menu-open' : '' }}">
                    <a href="{{ route('products.index') }}"
                        class="nav-link {{ Route::is('products.index') || Route::is('products.*') || Route::is('productCategories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <span class="badge badge-info right">{{ App\Models\Product::count() }}</span>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}"
                                class="nav-link {{ Route::is('products.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('products.create') }}"
                                class="nav-link {{ Route::is('products.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('productCategories.index') }}"
                                class="nav-link {{ Route::is('productCategories.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Categories</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('orders.index') }}"
                        class="nav-link {{ Route::is('orders.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <span class="right badge badge-info">{{ \App\Models\Order::count() }}</span>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('activity-log.index') }}"
                        class="nav-link {{ Route::is('activity-log.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <span class="right badge badge-info">{{ \Spatie\Activitylog\Models\Activity::count() }}</span>
                        <p>
                            Logs
                        </p>
                    </a>
                </li>


                <li class="nav-header">Admin</li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ Route::is('users.index') || Route::is('users.index.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span class="right badge badge-info">{{ App\Models\User::count() }}</span>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
