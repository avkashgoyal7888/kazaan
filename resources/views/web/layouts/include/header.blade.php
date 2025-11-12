<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-lg-5 py-lg-0 bg-white px-4 py-3">
        <a href="{{ route('web.home') }}" wire:navigate class="navbar-brand d-flex align-items-center p-0">
            <img src="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748707541/kazan/jcrlpt9xqqvllujq4qva.webp"
                alt="Logo" style="width: auto; height: 60px; object-fit: contain">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('web.home') }}" wire:navigate class="nav-item nav-link active">Home</a>
                <a href="{{ route('web.about-us') }}" wire:navigate class="nav-item nav-link">About Us</a>
                <a href="{{ route('web.booking') }}" wire:navigate class="nav-item nav-link">Online Bookings</a>
                <a href="{{ route('web.packages') }}" wire:navigate class="nav-item nav-link">Packages</a>
                <a href="{{ route('web.services') }}" wire:navigate class="nav-item nav-link">Services</a>
                <a href="{{ route('web.resorts') }}" wire:navigate class="nav-item nav-link">Resorts</a>
                <a href="{{ route('web.gallery') }}" wire:navigate class="nav-item nav-link">Gallery</a>
                <a href="{{ route('web.contact') }}" wire:navigate class="nav-item nav-link">Contacts</a>
                @auth
                    @if (auth()->user()->type === 'User')
                        <a href="{{ route('web.logout') }}" wire:navigate class="nav-item nav-link">Logout</a>
                    @endif
                @endauth

            </div>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->
