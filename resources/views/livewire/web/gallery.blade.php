<div>
    @push('css')
        <title>Gallery | Kazaan Lifestyle</title>
        <meta name="description"
            content="Explore the Kazaan Lifestyle gallery featuring stunning travel images and immersive videos. Discover breathtaking destinations, luxury stays, and unforgettable moments from around the world.">

        <link href="https://unpkg.com/cloudinary-video-player@1.11.0/dist/cld-video-player.min.css" rel="stylesheet">
        <style>
            .gallery-item {
                position: relative;
                overflow: hidden;
                border-radius: 15px;
                transition: all 0.3s ease;
                cursor: pointer;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                height: 100%;
                background: #f8f9fa;
            }

            .gallery-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            .gallery-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
                transition: transform 0.3s ease;
            }

            .gallery-item:hover .gallery-image {
                transform: scale(1.05);
            }

            .play-btn {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.9);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                color: #333;
                transition: all 0.3s ease;
            }

            .play-btn:hover {
                transform: translate(-50%, -50%) scale(1.1);
                background: white;
            }

            .gallery-badge {
                position: absolute;
                top: 15px;
                right: 15px;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 20px;
                padding: 6px 12px;
                font-size: 11px;
                font-weight: 600;
                color: #333;
            }

            .card-small {
                height: 180px;
            }

            .card-medium {
                height: 240px;
            }

            .card-large {
                height: 320px;
            }

            .card-xlarge {
                height: 380px;
            }

            @media (min-width: 1200px) {
                .col-custom-5 {
                    flex: 0 0 20%;
                    max-width: 20%;
                }

                .col-custom-7 {
                    flex: 0 0 35%;
                    max-width: 35%;
                }

                .col-custom-3 {
                    flex: 0 0 15%;
                    max-width: 15%;
                }

                .col-custom-6 {
                    flex: 0 0 30%;
                    max-width: 30%;
                }
            }

            @media (max-width: 1199px) {
                .card-small {
                    height: 180px;
                }

                .card-medium {
                    height: 250px;
                }

                .card-large {
                    height: 320px;
                }

                .card-xlarge {
                    height: 380px;
                }
            }

            @media (max-width: 991px) {
                .card-small {
                    height: 160px;
                }

                .card-medium {
                    height: 220px;
                }

                .card-large {
                    height: 280px;
                }

                .card-xlarge {
                    height: 320px;
                }
            }

            @media (max-width: 767px) {
                .card-small {
                    height: 150px;
                }

                .card-medium {
                    height: 200px;
                }

                .card-large {
                    height: 250px;
                }

                .card-xlarge {
                    height: 280px;
                }

                .modal-nav {
                    width: 40px;
                    height: 40px;
                    font-size: 14px;
                }
            }

            @media (max-width: 575px) {
                .card-small {
                    height: 140px;
                }

                .card-medium {
                    height: 180px;
                }

                .card-large {
                    height: 220px;
                }

                .card-xlarge {
                    height: 250px;
                }
            }

            .modal-content {
                background: #000 !important;
                border: none !important;
                border-radius: 10px !important;
            }

            .modal-body {
                padding: 0;
                position: relative;
            }

            .modal-video,
            .modal-image {
                width: 100%;
                max-height: 80vh;
                object-fit: contain;
            }

            /* Modal Navigation */
            .modal-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0, 0, 0, 0.7);
                color: white;
                border: none;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                font-size: 18px;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 1000;
            }

            .modal-nav:hover {
                background: rgba(0, 0, 0, 0.9);
                transform: translateY(-50%) scale(1.1);
            }

            .modal-nav-prev {
                left: 20px;
            }

            .modal-nav-next {
                right: 20px;
            }

            .modal-counter {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 14px;
                z-index: 1000;
            }

            .filter-tabs {
                background: rgba(248, 249, 250, 0.9);
                border-radius: 50px;
                padding: 8px;
                margin: 30px 0;
                display: inline-flex;
            }

            .filter-btn {
                border: none;
                background: transparent;
                padding: 10px 25px;
                border-radius: 40px;
                transition: all 0.3s ease;
                font-weight: 500;
                color: #666;
            }

            .filter-btn.active,
            .filter-btn:hover {
                background: #0d6efd;
                color: white;
                transform: translateY(-1px);
            }

            .load-more-btn {
                background: #0d6efd;
                border: none;
                color: white;
                padding: 15px 40px;
                border-radius: 50px;
                font-weight: 600;
                font-size: 16px;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .load-more-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            }

            .load-more-btn:disabled {
                opacity: 0.6;
                cursor: not-allowed;
                transform: none;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .fade-in {
                animation: fadeIn 0.4s ease forwards;
            }

            .cld-video-player {
                width: 100% !important;
                height: auto !important;
            }
        </style>
    @endpush

    <!-- Filter Tabs -->
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="filter-tabs">
                    <button class="filter-btn {{ $filter === 'all' ? 'active' : '' }}" wire:click="setFilter('all')">All Moments</button>
                    <button class="filter-btn {{ $filter === 'image' ? 'active' : '' }}" wire:click="setFilter('image')">Photos</button>
                    <button class="filter-btn {{ $filter === 'video' ? 'active' : '' }}" wire:click="setFilter('video')">Videos</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container-fluid px-3 pb-5">
        @if (count($galleries) > 0)
            <div class="row g-3" id="galleryGrid">
                @foreach ($galleries as $index => $gallery)
                    @php
                        // Create varied layouts with more balanced height distribution
                        $patterns = [
                            // Pattern 1: Medium card, varied mobile sizes
                            ['xl' => 'col-xl-3', 'lg' => 'col-lg-4', 'md' => 'col-md-6', 'sm' => 'col-sm-4', 'xs' => 'col-6', 'class' => 'card-medium'],
                            // Pattern 2: Large card, spans more on mobile
                            ['xl' => 'col-xl-4', 'lg' => 'col-lg-8', 'md' => 'col-md-6', 'sm' => 'col-sm-8', 'xs' => 'col-12', 'class' => 'card-medium'],
                            // Pattern 3: Small card, compact on all sizes
                            ['xl' => 'col-xl-2', 'lg' => 'col-lg-4', 'md' => 'col-md-6', 'sm' => 'col-sm-3', 'xs' => 'col-4', 'class' => 'card-small'],
                            // Pattern 4: Small-medium card
                            ['xl' => 'col-xl-3', 'lg' => 'col-lg-4', 'md' => 'col-md-6', 'sm' => 'col-sm-4', 'xs' => 'col-6', 'class' => 'card-small'],
                            // Pattern 5: Medium card with varied mobile
                            ['xl' => 'col-xl-3', 'lg' => 'col-lg-6', 'md' => 'col-md-6', 'sm' => 'col-sm-6', 'xs' => 'col-8', 'class' => 'card-medium'],
                            // Pattern 6: Large card, prominent on mobile
                            ['xl' => 'col-xl-4', 'lg' => 'col-lg-6', 'md' => 'col-md-6', 'sm' => 'col-sm-12', 'xs' => 'col-12', 'class' => 'card-large'],
                            // Pattern 7: Small card, stays compact
                            ['xl' => 'col-xl-2', 'lg' => 'col-lg-4', 'md' => 'col-md-6', 'sm' => 'col-sm-3', 'xs' => 'col-4', 'class' => 'card-small'],
                            // Pattern 8: Extra large card, very prominent
                            ['xl' => 'col-xl-3', 'lg' => 'col-lg-6', 'md' => 'col-md-6', 'sm' => 'col-sm-8', 'xs' => 'col-12', 'class' => 'card-xlarge'],
                        ];
                        $pattern = $patterns[$index % count($patterns)];
                        $colClasses = $pattern['xl'] . ' ' . $pattern['lg'] . ' ' . $pattern['md'] . ' ' . $pattern['sm'] . ' ' . $pattern['xs'];
                        $galleryItem = (object) $gallery; // Convert array to object for easier access
                    @endphp
                    
                    <div class="{{ $colClasses }} fade-in gallery-item-container" data-type="{{ strtolower($galleryItem->type) }}" data-index="{{ $index }}">
                        <div class="gallery-item {{ $pattern['class'] }}" onclick="openModal({{ $index }})">
                            @if ($galleryItem->type === 'Image')
                                <img src="{{ $galleryItem->image }}" alt="Travel Destination" class="gallery-image">
                            @else
                                <img src="{{ $galleryItem->video_thumb }}" alt="Travel Video" class="gallery-image">
                                <div class="play-btn">
                                    <i class="fas fa-play" style="margin-left: 2px;"></i>
                                </div>
                            @endif

                            <!-- Badge -->
                            <div class="gallery-badge">
                                <i class="fas fa-{{ $galleryItem->type === 'Image' ? 'camera' : 'video' }} me-1"></i>
                                {{ $galleryItem->type === 'Image' ? 'Photo' : 'Video' }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            @if($hasMore)
            <div class="row justify-content-center mt-5">
                <div class="col-auto">
                    <button class="load-more-btn" 
                            wire:click="loadMore" 
                            wire:loading.attr="disabled"
                            wire:target="loadMore">
                        <div wire:loading wire:target="loadMore">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <span wire:loading.remove wire:target="loadMore">Load More Memories</span>
                        <span wire:loading wire:target="loadMore">Loading...</span>
                    </button>
                </div>
            </div>
            @endif

            <!-- Debug Info (remove in production) -->
            {{-- @if(config('app.debug'))
            <div class="row justify-content-center mt-3">
                <div class="col-auto">
                    <small class="text-muted">
                        Loaded: {{ count($galleries) }} | HasMore: {{ $hasMore ? 'Yes' : 'No' }} | Page: {{ $currentPage }} | Filter: {{ $filter }}
                    </small>
                </div>
            </div>
            @endif --}}

            <!-- Single Modal for All Content -->
            <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div id="modalContent"></div>
                            
                            <!-- Navigation Buttons -->
                            <button class="modal-nav modal-nav-prev" onclick="navigateModal(-1)">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="modal-nav modal-nav-next" onclick="navigateModal(1)">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            
                            <!-- Counter -->
                            <div class="modal-counter" id="modalCounter"></div>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="row justify-content-center py-5">
                <div class="col-lg-6 text-center">
                    <div class="py-5">
                        <i class="fas fa-camera-retro mb-4" style="font-size: 4rem; color: #ccc;"></i>
                        <h3 class="mb-3">Coming Soon!</h3>
                        <p class="text-muted">We're preparing amazing travel content for you. Stay tuned for breathtaking destinations and incredible adventures!</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @push('js')
    <script src="https://unpkg.com/cloudinary-video-player@1.11.0/dist/cld-video-player.min.js" type="text/javascript"></script>
    <script>
        // Gallery data for modal navigation
        let galleryData = @json($galleries);
        let currentModalIndex = 0;
        let filteredItems = [];
        let currentVideoPlayer = null;

        // Initialize Cloudinary video player
        function initializeVideoPlayer(videoElement) {
            if (currentVideoPlayer) {
                try {
                    currentVideoPlayer.dispose();
                } catch (e) {
                    console.log('Error disposing previous player:', e);
                }
            }

            try {
                const videoUrl = videoElement.getAttribute('data-video');
                const playerId = videoElement.getAttribute('id');
                
                currentVideoPlayer = cloudinary.videoPlayer(playerId, {
                    cloudName: 'dmbgfw4bu',
                    controls: true,
                    showJumpControls: true,
                    pictureInPictureToggle: true,
                    floatingWhenNotVisible: 'right',
                    loop: false,
                    fluid: true,
                    autoplay: false,
                    muted: false
                });
                
                currentVideoPlayer.source(videoUrl);
                
                // Auto-play when loaded
                currentVideoPlayer.ready(() => {
                    currentVideoPlayer.play();
                });
                
            } catch (error) {
                console.error('Error initializing video player:', error);
            }
        }

        // Initialize filtered items
        function updateFilteredItems() {
            const allItems = document.querySelectorAll('[data-index]');
            
            filteredItems = [];
            allItems.forEach(item => {
                const isVisible = item.style.display !== 'none';
                if (isVisible) {
                    filteredItems.push(parseInt(item.dataset.index));
                }
            });
        }

        // Open modal with specific index
        function openModal(index) {
            updateFilteredItems();
            currentModalIndex = filteredItems.indexOf(index);
            if (currentModalIndex === -1) currentModalIndex = 0;
            
            updateModalContent();
            const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
            modal.show();
        }

        // Navigate modal
        function navigateModal(direction) {
            // Dispose current video player if exists
            if (currentVideoPlayer) {
                try {
                    currentVideoPlayer.dispose();
                    currentVideoPlayer = null;
                } catch (e) {
                    console.log('Error disposing player:', e);
                }
            }

            currentModalIndex += direction;
            
            if (currentModalIndex >= filteredItems.length) {
                currentModalIndex = 0;
            } else if (currentModalIndex < 0) {
                currentModalIndex = filteredItems.length - 1;
            }
            
            updateModalContent();
        }

        // Update modal content
        function updateModalContent() {
            if (filteredItems.length === 0) return;
            
            const actualIndex = filteredItems[currentModalIndex];
            const gallery = galleryData[actualIndex];
            const modalContent = document.getElementById('modalContent');
            const modalCounter = document.getElementById('modalCounter');
            
            if (gallery.type === 'Image') {
                modalContent.innerHTML = `<img src="${gallery.image}" class="modal-image" alt="Travel Destination">`;
            } else {
                const uniquePlayerId = `modal-player-${Date.now()}`;
                modalContent.innerHTML = `
                    <video id="${uniquePlayerId}" 
                           data-video="${gallery.video}"
                           poster="${gallery.video_thumb}" 
                           controls 
                           muted
                           class="cld-video-player modal-video">
                    </video>
                `;
                
                // Initialize video player after DOM is updated
                setTimeout(() => {
                    const videoElement = document.getElementById(uniquePlayerId);
                    if (videoElement) {
                        initializeVideoPlayer(videoElement);
                    }
                }, 100);
            }
            
            modalCounter.textContent = `${currentModalIndex + 1} / ${filteredItems.length}`;
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('galleryModal');
            if (modal.classList.contains('show')) {
                if (e.key === 'ArrowLeft') {
                    navigateModal(-1);
                } else if (e.key === 'ArrowRight') {
                    navigateModal(1);
                } else if (e.key === 'Escape') {
                    bootstrap.Modal.getInstance(modal).hide();
                }
            }
        });

        // Clean up when modal closes
        document.getElementById('galleryModal').addEventListener('hidden.bs.modal', function() {
            if (currentVideoPlayer) {
                try {
                    currentVideoPlayer.dispose();
                    currentVideoPlayer = null;
                } catch (e) {
                    console.log('Error disposing player on modal close:', e);
                }
            }
        });

        // Initialize filtered items on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateFilteredItems();
        });

        // Touch/swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        document.getElementById('galleryModal').addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.getElementById('galleryModal').addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > swipeThreshold) {
                    navigateModal(1); // Swipe left, go to next
                } else if (diff < -swipeThreshold) {
                    navigateModal(-1); // Swipe right, go to previous
                }
            }
        }

        // Listen for Livewire updates to refresh gallery data
        document.addEventListener('livewire:updated', function () {
            galleryData = @json($galleries);
            updateFilteredItems();
        });
    </script>
    @endpush
</div>