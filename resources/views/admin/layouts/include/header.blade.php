<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 px-md-1 px-sm-1">
    <div class="container-fluid d-flex align-items-center">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748707541/kazan/jcrlpt9xqqvllujq4qva.webp"
                alt="Logo" style="height: 40px" />
        </a>

        <div class="flex-grow-1"></div>

        <!-- Right Side -->
        <div class="d-flex align-items-center">
            <!-- Dark Mode Toggle -->
            <button class="btn me-2" id="modeToggle" type="button">
                <i class="bi bi-sun-fill" id="lightIcon"></i>
                <i class="bi bi-moon-fill d-none" id="darkIcon"></i>
            </button>

            <!-- Profile Dropdown -->
            <div class="dropdown me-2">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748707541/kazan/jcrlpt9xqqvllujq4qva.webp"
                        alt="User" class="profile-img" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    {{-- <li>
                        <a class="dropdown-item" href="#"><i class="bi bi-key me-2"></i>Change Password</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i>Change
                            Profile Image</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> --}}
                    <li>
                        <a class="dropdown-item" href="{{route('admin.logout')}}" wire:navigate><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Sidebar Toggle Button -->
            <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas">
                <i class="bi bi-list fs-4"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Sidebar -->
<div class="offcanvas offcanvas-start w-50" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" wire:navigate>
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.booking') }}" wire:navigate>
                <i class="bi bi-calendar-check me-2"></i> Booking
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.blogs') }}" wire:navigate>
                <i class="bi bi-journal-text me-2"></i> Blogs
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.gallery') }}" wire:navigate>
                <i class="bi bi-images me-2"></i> Gallery
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.resorts') }}" wire:navigate>
                <i class="bi bi-house-heart me-2"></i> Resorts
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.contact') }}" wire:navigate>
                <i class="bi bi-envelope-open me-2"></i> Contact Us
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.payments') }}" wire:navigate>
                <i class="bi bi-credit-card me-2"></i> Payments
            </a>
        </div>
        <div class="sidebar-item">
            <a href="{{ route('admin.logout') }}" wire:navigate>
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </div>
        {{-- <div class="sidebar-item"><i class="bi bi-people me-2"></i> Users</div>

        <div class="sidebar-item" data-bs-toggle="collapse" data-bs-target="#programmeSubmenuMobile">
            <div class="d-flex justify-content-between">
                <div><i class="bi bi-collection me-2"></i> Programme</div>
                <i class="bi bi-chevron-down"></i>
            </div>
        </div>
        <div class="collapse" id="programmeSubmenuMobile">
            <div class="sidebar-item sub-menu">
                <i class="bi bi-circle me-2"></i> Option 1
            </div>
            <div class="sidebar-item sub-menu">
                <i class="bi bi-circle me-2"></i> Option 2
            </div>
        </div>

        <div class="sidebar-item"><i class="bi bi-gear me-2"></i> Settings</div> --}}
    </div>
</div>

<!-- Main Layout -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar for large devices -->
        <div class="col-lg-2 col-md-3 d-none d-lg-block sidebar p-3">
            <div class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" wire:navigate>
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.booking') }}" wire:navigate>
                    <i class="bi bi-calendar-check me-2"></i> Booking
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.blogs') }}" wire:navigate>
                    <i class="bi bi-journal-text me-2"></i> Blogs
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.gallery') }}" wire:navigate>
                    <i class="bi bi-images me-2"></i> Gallery
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.resorts') }}" wire:navigate>
                    <i class="bi bi-house-heart me-2"></i> Resorts
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.contact') }}" wire:navigate>
                    <i class="bi bi-envelope-open me-2"></i> Contact Us
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.payments') }}" wire:navigate>
                    <i class="bi bi-credit-card me-2"></i> Payments
                </a>
            </div>
            <div class="sidebar-item">
                <a href="{{ route('admin.logout') }}" wire:navigate>
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
            </div>
            {{-- <div class="sidebar-item">
                <i class="bi bi-people me-2"></i> Users
            </div>
            <div class="sidebar-item" data-bs-toggle="collapse" data-bs-target="#programmeSubmenuDesktop">
                <div class="d-flex justify-content-between">
                    <div><i class="bi bi-collection me-2"></i> Programme</div>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
            <div class="collapse" id="programmeSubmenuDesktop">
                <div class="sidebar-item sub-menu">
                    <i class="bi bi-circle me-2"></i> Option 1
                </div>
                <div class="sidebar-item sub-menu">
                    <i class="bi bi-circle me-2"></i> Option 2
                </div>
            </div>
            <div class="sidebar-item">
                <i class="bi bi-gear me-2"></i> Settings
            </div> --}}
        </div>
