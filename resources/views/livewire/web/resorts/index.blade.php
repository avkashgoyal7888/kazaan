<div>
    @push('css')
        <title>Resorts | Kazaan Lifestyle</title>
        <meta name="description"
            content="Explore a handpicked collection of luxury resorts with Kazaan Lifestyle. Find your perfect escape with world-class amenities, breathtaking locations, and personalized travel experiences.">
    @endpush
    <!-- Breadcrumb Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background:linear-gradient(rgba(19, 146, 242, 0.2)), url('https://wallpapershome.com/images/pages/pic_h/666.jpg');">
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h3 class="display-3 mb-4 text-white">Resorts</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('web.home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Resorts</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto mb-5 text-center" style="max-width: 900px;">
                <h5 class="section-title px-3">Resorts</h5>
            </div>
            <div class="row g-5">
                @foreach ($resorts as $resort)
                    <div class="col-lg-3 col-md-3">
                        <div class="card h-100">
                            <img src="{{ $resort->primary_img }}" class="card-img-top" alt="{{ $resort->resort_name }}">
                            <div class="card-body d-flex flex-column">
                                <span class="resort-name fw-bold">{{ $resort->resort_name }}</span>
                                <p class="resort-city text-muted mb-1">{{ $resort->resort_address }}</p>
                                <p class="resort-details flex-grow-1">
                                    {{ \Illuminate\Support\Str::limit($resort->detail, 100, '...') }}</p>
                                <a href="{{ route('web.resorts.detail', $resort->slug) }}" wire:navigate
                                    class="btn btn-warning btn-sm mt-2">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $resorts->links() }}
            </div>
        </div>
    </div>
    <!-- Packages End -->
</div>
