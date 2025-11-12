<div wire:navigate>
    @push('css')
        <title>Blogs | Kazaan Lifestyle</title>
        <meta name="description"
            content="Explore travel stories, expert tips, destination guides, and curated experiences on the Kazaan Lifestyle blog – your go-to source for travel inspiration.">
        <style>
            [wire\:navigate] {
                scroll-behavior: smooth;
            }
        </style>
    @endpush
    <!-- Breadcrumb End -->


    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="mx-auto mb-5 text-center" style="max-width: 900px;">
                <h5 class="section-title px-3">Our Blog</h5>
                <h1 class="mb-4">Popular Travel Blogs</h1>
                <p class="mb-0">Join us as we uncover hidden gems, iconic landmarks, and unforgettable journeys across
                    the globe. From local secrets to bucket-list adventures, our stories are your passport to
                    inspiration. Let’s turn your travel dreams into your next destination.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="blog-img-inner">
                                    <img class="img-fluid w-100 rounded-top" src="{{ $blog->image }}"
                                        alt="{{ $blog->title }}">
                                    <div class="blog-icon">
                                        <a href="{{route('web.blog.detail',$blog->slug)}}" wire:navigate class="my-auto"><i
                                                class="fas fa-link fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content border-top-0 rounded-bottom border p-4">
                                <p class="mb-3">Posted On : {{ $blog->created_at->format('d-F-Y') }}</p>
                                <h4>{{ $blog->title }}</h4>
                                <p class="my-3">{{ $blog->sub_title }}</p>
                                <a href="{{route('web.blog.detail',$blog->slug)}}" wire:navigate class="btn btn-primary rounded-pill px-4 py-2">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>No Record Found</div>
                @endforelse
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
    <!-- Blog End -->
</div>
