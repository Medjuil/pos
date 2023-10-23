<div class="navbar bg-white">
    <div class="container-fluid justify-content-between">
        <a href="#" id="aside-toggler" class="navbar-brand py-0 m-0 d-flex">
            <span class="material-icons-outlined">tune</span>
        </a>
        <div id="tinkerpro-pos-navbar">
            <ul class="nav">
                <li class="nav-item dropdown d-flex align-items-center">
                    <a href="" class="nav-link p-0" data-bs-toggle="dropdown" data-bs-target="#tinker-pro-pos-dropdown">
                        <img src="{{ auth()->user()->profile ? asset(str_replace('public','storage', auth()->user()->profile)) : asset('assets/images/avatar-1968236_1280.png') }}" class="img-fluid rounded-circle" width="50" alt="" srcset="">
                        {{-- <img src="{{ asset('assets/images/avatar-1968236_1280.png') }}" class="img-fluid rounded-circle" width="50" alt="" srcset=""> --}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 bg-white shadow-sm">
                        <li class="dropdown-item">
                            <a href="{{ route('admin.accounts.my-account') }}" class="nav-link d-flex align-items-center">
                                <div class="icon-container d-flex me-2"><span class="material-icons-outlined">manage_accounts</span></div>
                                <div class="text-container pos-text-color"><span>My Account</span></div>
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="nav-link d-flex align-items-center">
                                <div class="icon-container d-flex me-2"><span class="material-icons-outlined">directions_run</span></div>
                                <div class="text-container pos-text-color"><span>Sign Out</span></div>
                            </a>
                            <form action="{{ route('logout') }}" id="logout" method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>