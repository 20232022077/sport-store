<aside class="admin-sidebar">

    <div class="sidebar-brand">
        <i class="fa-solid fa-store"></i> Sport <span>Admin</span>
    </div>

    <nav class="sidebar-menu">

        <div class="menu-label">Main</div>

        {{-- Dashboard --}}
        <div class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}">
                <span class="icon"><i class="fa-solid fa-gauge"></i></span> Dashboard
            </a>
        </div>

        <div class="menu-label">Catalog</div>

        {{-- Products --}}
        <div class="menu-item {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
            <a href="{{ route('admin.product.index') }}">
                <span class="icon"><i class="fa-solid fa-box"></i></span> Products
            </a>
        </div>

        {{-- Categories --}}
        <div class="menu-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
            <a href="{{ route('admin.category.index') }}">
                <span class="icon"><i class="fa-solid fa-tags"></i></span> Categories
            </a>
        </div>

        <div class="menu-label">Sales</div>

        {{-- Orders --}}
        <div class="menu-item">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-cart-shopping"></i></span> Orders
            </a>
        </div>

        {{-- Messages --}}
        <div class="menu-item {{ request()->routeIs('admin.message.*') ? 'active' : '' }}">
            <a href="{{ route('admin.message.index') }}">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span> Messages
            </a>
        </div>

        {{-- Users --}}
        <div class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <span class="icon"><i class="fa-solid fa-users"></i></span> Users
            </a>
        </div>

        <div class="menu-label">System</div>

        {{-- Roles & Permissions Dropdown --}}
        <div class="menu-item has-dropdown {{ request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*') ? 'menu-open active' : '' }}">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-user-shield"></i></span>
                Roles & Permissions
                <i class="fa-solid fa-angle-left dropdown-arrow"></i>
            </a>
            <ul class="nav-treeview">
                <li class="menu-item {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span> Roles
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}">
                        <span class="icon"><i class="fa-solid fa-key"></i></span> Permissions
                    </a>
                </li>
            </ul>
        </div>

        {{-- Settings --}}
        <div class="menu-item {{ request()->routeIs('admin.setting.*') ? 'active' : '' }}">
            <a href="{{ route('admin.setting.edit') }}">
                <span class="icon"><i class="fa-solid fa-gear"></i></span> Settings
            </a>
        </div>

        {{-- View Site --}}
        <div class="menu-item">
            <a href="{{ url('/') }}">
                <span class="icon"><i class="fa-solid fa-globe"></i></span> View Site
            </a>
        </div>

    </nav>

</aside>
