<section class="sidebar-header">
    <div class="sidebar-logo-container">
        <img src="{{ asset('assets/images/tinkerpro-logo.png') }}" class="position-relative" alt="tinker pro logo">
    </div>
</section>
<ul class="nav my-4">
    <li class="nav-item @if(request()->segment(1) === "dashboard") active @endif">
        <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">dashboard</span></div>
            <div class="text-container"><span>Dashboard</span></div>
        </a>
    </li>
    {{-- <li class="nav-item @if(request()->segment(2) === "my-account") active @endif">
        <a href="{{ route('admin.accounts.my-account') }}" class="nav-link d-flex align-items-center">My Account</a>
    </li> --}}
    <li class="nav-item @if(request()->segment(2) === "users") active @endif">
        <a href="{{ route('admin.accounts.users.index') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">group</span></div>
            <div class="text-container"><span>Users</span></div>
        </a>
    </li>
    <li class="nav-item @if(request()->segment(1) === "customers") active @endif">
        <a href="{{ route('admin.customers.index') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">groups_3</span></div>
            <div class="text-container"><span>Customers</span></div>
        </a>
    </li>


    <li class="nav-item @if(request()->segment(1) === "products" && request()->segment(2) !== 'categories') active @endif">
        <a href="{{ route('admin.products.index') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">production_quantity_limits</span></div>
            <div class="text-container"><span>Products</span></div>
        </a>
    </li>
    <li class="nav-item @if(request()->segment(2) === "categories") active @endif">
        <a href="{{ route('admin.categories.index') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">category</span></div>
            <div class="text-container"><span>Product Categories</span></div>
        </a>
    </li>
    <li class="nav-item @if(request()->segment(1) === "suppliers") active @endif">
        <a href="{{ route('admin.suppliers.index') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">local_shipping</span></div>
            <div class="text-container"><span>Suppliers</span></div>
        </a>
    </li>
    <li class="nav-item @if(request()->segment(1) === "taxes") active @endif">
        <a href="{{ route('admin.taxes.index') }}" class="nav-link d-flex align-items-center">
            <div class="icon-container d-flex me-2"><span class="material-icons-outlined">featured_play_list</span></div>
            <div class="text-container"><span>Taxes</span></div>
        </a>
    </li>
    {{-- <li class="nav-item @if(request()->segment(1) === "sales") active @endif">
        <a href="{{ route('value') }}" class="nav-link d-flex align-items-center">Sales</a>
    </li> --}}
</ul>