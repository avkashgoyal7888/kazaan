<!-- Subscribe Start -->
<div class="container-fluid subscribe py-5">
    <div class="container py-5 text-center">
        <div class="mx-auto text-center" style="max-width: 900px;">
            <h5 class="subscribe-title px-3">Subscribe</h5>
            <h1 class="mb-4 text-white">Get Updates & More</h1>
            <p class="mb-5 text-white">Thoughtful thoughts to your inbox</p>
            <div class="position-relative mx-auto">
                <input class="form-control border-primary rounded-pill w-100 py-3 pe-5 ps-4" type="text"
                    placeholder="Your email">
                <button type="button"
                    class="btn btn-primary rounded-pill position-absolute end-0 top-0 me-2 mt-2 px-4 py-2">Subscribe</button>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe End -->
<!-- Footer Start -->
<div class="container-fluid footer py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Need Help</h4>
                    <a href=""><i class="fas fa-envelope me-2"></i> info@kazanlifestyle.com</a>
                    <a href=""><i class="fas fa-phone me-2"></i> +91-9209412692</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Company</h4>
                    <a href="{{route('web.home')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Home</a>
                    <a href="{{route('web.about-us')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="{{route('web.services')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Services</a>
                    <a href="{{route('web.contact')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Contact</a>
                    <a href="{{route('web.blogs')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Blogs</a>
                    <a href="{{route('web.gallery')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Gallery</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Important Links</h4>
                    <a href="{{route('web.booking')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Online Bookings</a>
                    <a href="{{route('web.packages')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Packages</a>
                    <a href="{{route('web.resorts')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Resorts</a>
                    {{-- <a href="#"><i class="fas fa-angle-right me-2"></i> Reservations</a> --}}
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">More</h4>
                    <a href="{{route('web.terms-condition')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                    <a href="{{route('web.privacy-policy')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                    <a href="{{route('web.return-refund')}}" wire:navigate><i class="fas fa-angle-right me-2"></i> Return & Refunds</a>
                    <a href="https://kazaanlifestyle.com/sitemap.xml"><i class="fas fa-angle-right me-2"></i> Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->