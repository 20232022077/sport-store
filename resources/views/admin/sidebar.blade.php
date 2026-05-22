<aside class="admin-sidebar">

    <div class="sidebar-brand">
        <i class="fa-solid fa-store"></i> Sport <span>Admin</span>
    </div>

    <nav class="sidebar-menu">

        <div class="menu-label">Main</div>

        <div class="menu-item active">
            <a href="{{ url('/admin') }}">
                <span class="icon"><i class="fa-solid fa-gauge"></i></span> Dashboard
            </a>
        </div>

        <div class="menu-label">Catalog</div>

        <div class="menu-item">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-box"></i></span> Products
            </a>
        </div>
        <div class="menu-item">
            <a href="{{ url('/admin/category') }}">
                <span class="icon"><i class="fa-solid fa-tags"></i></span> Categories
            </a>
        </div>

        <div class="menu-label">Sales</div>

        <div class="menu-item">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-cart-shopping"></i></span> Orders
            </a>
        </div>
        <div class="menu-item">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-users"></i></span> Customers
            </a>
        </div>

        <div class="menu-label">System</div>

        <div class="menu-item">
            <a href="#">
                <span class="icon"><i class="fa-solid fa-gear"></i></span> Settings
            </a>
        </div>
        <div class="menu-item">
            <a href="{{ url('/') }}">
                <span class="icon"><i class="fa-solid fa-globe"></i></span> View Site
            </a>
        </div>

    </nav>

</aside>
