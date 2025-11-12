<div>
    @push('css')
    <title>{{ $blog->title }} - Kazaan Lifestyle</title>
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 150, '...') }}">
    
        <style>
            * {
                box-sizing: border-box;
            }
    
            .blog-hero {
                position: relative;
                height: 70vh;
                min-height: 500px;
                overflow: hidden;
                border-radius: 0 0 50px 50px;
            }
    
            .blog-hero-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: brightness(0.4);
            }
    
            .blog-content-card {
                background: white;
                border-radius: 30px;
                padding: 50px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(0, 0, 0, 0.05);
                margin-top: -100px;
                position: relative;
                z-index: 3;
            }
    
            .blog-title-main {
                font-size: 2.5rem;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 1rem;
                line-height: 1.3;
            }
    
            .blog-subtitle {
                font-size: 1.3rem;
                font-weight: 600;
                margin-bottom: 2rem;
                line-height: 1.6;
                padding: 20px;
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                border-radius: 15px;
                border-left: 4px solid #6366f1;
            }
    
            .blog-content {
                font-size: 1.1rem;
                line-height: 1.8;
                color: #374151;
            }
    
            .blog-content h2 {
                font-size: 2rem;
                font-weight: 700;
                color: #1f2937;
                margin: 2.5rem 0 1rem 0;
                position: relative;
                padding-bottom: 10px;
            }
    
            .blog-content h2::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 3px;
                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                border-radius: 2px;
            }
    
            .blog-content h3 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #374151;
                margin: 2rem 0 1rem 0;
            }
    
            .blog-content p {
                margin-bottom: 1.5rem;
            }
    
            .blog-content img {
                width: 100%;
                height: auto;
                border-radius: 20px;
                margin: 2rem 0;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }
    
            .blog-content img:hover {
                transform: scale(1.02);
            }
    
            .blog-content blockquote {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                border-left: 4px solid #6366f1;
                padding: 1.5rem;
                margin: 2rem 0;
                border-radius: 15px;
                font-style: italic;
                font-size: 1.1rem;
                position: relative;
            }
    
            .blog-content blockquote::before {
                content: '"';
                font-size: 4rem;
                color: #6366f1;
                position: absolute;
                top: -10px;
                left: 20px;
                opacity: 0.3;
            }
    
            .sidebar-card {
                background: white;
                border-radius: 25px;
                padding: 30px;
                margin-bottom: 30px;
                box-shadow: 0 15px 45px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(0, 0, 0, 0.05);
                position: sticky;
                top: 20px;
            }
    
            .sidebar-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #1f2937;
                margin-bottom: 1.5rem;
                position: relative;
                padding-bottom: 10px;
            }
    
            .sidebar-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 40px;
                height: 3px;
                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                border-radius: 2px;
            }
    
            .next-blog {
                display: block;
                text-decoration: none;
                color: inherit;
                margin-bottom: 20px;
                transition: all 0.3s ease;
                border-radius: 15px;
                overflow: hidden;
                background: #f8fafc;
                border: 1px solid rgba(0, 0, 0, 0.05);
                position: relative;
            }
    
            .next-blog:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
                text-decoration: none;
                color: inherit;
                background: white;
            }
    
            .next-blog-image {
                width: 80px;
                height: 80px;
                object-fit: cover;
                border-radius: 10px;
                flex-shrink: 0;
            }
    
            .next-blog-content {
                flex: 1;
                min-width: 0;
            }
    
            .next-blog-title {
                font-weight: 600;
                color: #1f2937;
                font-size: 0.95rem;
                line-height: 1.4;
                margin: 0 0 5px 0;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
    
            .next-blog-date {
                font-size: 0.8rem;
                color: #6b7280;
                display: flex;
                align-items: center;
                gap: 5px;
            }
    
            .progress-bar {
                position: fixed;
                top: 0;
                left: 0;
                width: 0%;
                height: 4px;
                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                z-index: 9999;
                transition: width 0.1s ease;
            }
    
            .blog-meta-info {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-bottom: 2rem;
                flex-wrap: wrap;
            }
    
            .meta-item {
                display: flex;
                align-items: center;
                gap: 8px;
                color: #6b7280;
                font-size: 0.9rem;
            }
    
            .meta-item i {
                color: #6366f1;
            }
    
            .reading-time {
                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                color: white;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 500;
            }
    
            .social-share {
                margin-top: 3rem;
                padding-top: 2rem;
                border-top: 2px solid #f3f4f6;
            }
    
            .social-share-title {
                font-size: 1.1rem;
                font-weight: 600;
                color: #374151;
                margin-bottom: 15px;
            }
    
            .social-buttons {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }
    
            .social-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 10px 20px;
                border-radius: 25px;
                text-decoration: none;
                font-weight: 500;
                font-size: 0.9rem;
                transition: all 0.3s ease;
                border: 2px solid transparent;
            }
    
            .social-btn:hover {
                text-decoration: none;
                transform: translateY(-2px);
            }
    
            .social-btn.facebook {
                background: #1877f2;
                color: white;
            }
    
            .social-btn.facebook:hover {
                background: #166fe5;
                color: white;
            }
    
            .social-btn.twitter {
                background: #1da1f2;
                color: white;
            }
    
            .social-btn.twitter:hover {
                background: #1a91da;
                color: white;
            }
    
            .social-btn.linkedin {
                background: #0077b5;
                color: white;
            }
    
            .social-btn.linkedin:hover {
                background: #006aa3;
                color: white;
            }
    
            .social-btn.whatsapp {
                background: #25d366;
                color: white;
            }
    
            .social-btn.whatsapp:hover {
                background: #22c55e;
                color: white;
            }
    
            .empty-state {
                text-align: center;
                padding: 3rem 1rem;
                color: #6b7280;
            }
    
            .empty-state i {
                font-size: 3rem;
                margin-bottom: 1rem;
                opacity: 0.5;
            }
    
            /* Bootstrap responsive adjustments */
            @media (max-width: 991.98px) {
                .blog-hero {
                    height: 60vh;
                    min-height: 450px;
                    border-radius: 0 0 30px 30px;
                }
    
                .blog-content-card {
                    margin-top: -50px;
                    padding: 40px 30px;
                }
    
                .blog-title-main {
                    font-size: 2rem;
                }
            }
    
            @media (max-width: 767.98px) {
                .blog-hero {
                    height: 50vh;
                    min-height: 400px;
                    border-radius: 0 0 20px 20px;
                }
    
                .blog-content-card {
                    padding: 30px 20px;
                    border-radius: 20px;
                    margin-top: -30px;
                }
    
                .blog-title-main {
                    font-size: 1.75rem;
                }
    
                .blog-content {
                    font-size: 1rem;
                }
    
                .sidebar-card {
                    position: static;
                }
    
                .next-blog-image {
                    width: 70px;
                    height: 70px;
                }
    
                .next-blog-title {
                    font-size: 0.9rem;
                }
            }
    
            @media (max-width: 575.98px) {
    
                .blog-meta-info {
                    gap: 10px;
                }
    
                .social-buttons {
                    justify-content: center;
                }
    
                .social-btn {
                    padding: 8px 16px;
                    font-size: 0.8rem;
                }
            }
        </style>
    @endpush
    <div class="progress-bar" id="progressBar"></div>
    <div class="blog-hero">
        @if ($blog->image)
            {{-- <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="blog-hero-image"> --}}
            <div class="blog-hero-image" style="background: linear-gradient(135deg, #284be9 0%, #0d6efd 100%);"></div>
        @else
            <div class="blog-hero-image" style="background: linear-gradient(135deg, #284be9 0%, #0d6efd 100%);"></div>
        @endif
    </div>
    <div class="container-fluid px-lg-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <article class="blog-content-card">
                            <h1 class="blog-title-main">{{ $blog->title }}</h1>
                            <div class="blog-meta-info">
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $blog->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                                </div>
                                <div class="reading-time">
                                    <i class="fas fa-book-open me-1"></i>
                                    {{ str_word_count(strip_tags($blog->content)) }} words
                                </div>
                            </div>

                            @if ($blog->sub_title)
                                <div class="blog-subtitle text-primary">{{ $blog->sub_title }}</div>
                            @endif

                            <div class="blog-content">
                                {!! $blog->content !!}
                            </div>
                            <div class="social-share">
                                <h3 class="social-share-title">
                                    <i class="fas fa-share-alt me-2"></i>
                                    Share this article
                                </h3>
                                <div class="social-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank" class="social-btn facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <span class="d-none d-sm-inline">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}"
                                        target="_blank" class="social-btn twitter">
                                        <i class="fab fa-twitter"></i>
                                        <span class="d-none d-sm-inline">Twitter</span>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank" class="social-btn linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                        <span class="d-none d-sm-inline">LinkedIn</span>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->fullUrl()) }}"
                                        target="_blank" class="social-btn whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        <span class="d-none d-sm-inline">WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <aside class="sidebar mt-lg-0 mt-4">
                            <div class="sidebar-card">
                                <h3 class="sidebar-title">
                                    <i class="fas fa-newspaper me-2"></i>
                                    More Stories
                                </h3>

                                @forelse ($nexts as $next)
                                    <a href="{{ route('web.blog.detail', $next->slug) }}" wire:navigate class="next-blog">
                                        <div class="d-flex align-items-center gap-3 p-3">
                                            @if ($next->image)
                                                <img src="{{ $next->image }}" alt="{{ $next->title }}"
                                                    class="next-blog-image">
                                                    
                                            @else
                                            <div class="next-blog-image d-flex align-items-center justify-content-center bg-primary text-white">
                                                <i class="fas fa-newspaper fa-lg"></i>
                                            </div>
                                            @endif
                                            <div class="next-blog-content">
                                                <h4 class="next-blog-title">{{ $next->title }}</h4>
                                                <div class="next-blog-date">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    <span>{{ $next->created_at->format('M j, Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="empty-state">
                                        <i class="fas fa-newspaper"></i>
                                        <p class="mb-0">No related posts available</p>
                                        <small class="text-muted">Check back later for more content</small>
                                    </div>
                                @endforelse
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const progressBar = document.getElementById('progressBar');

            function updateProgressBar() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = (scrollTop / scrollHeight) * 100;
                progressBar.style.width = progress + '%';
            }

            window.addEventListener('scroll', updateProgressBar);
            const headings = document.querySelectorAll('.blog-content h2, .blog-content h3');
            const toc = document.getElementById('tableOfContents');

            if (headings.length > 0 && toc) {
                const tocList = document.createElement('ul');
                tocList.className = 'list-unstyled';

                headings.forEach((heading, index) => {
                    const id = 'heading-' + index;
                    heading.id = id;

                    const listItem = document.createElement('li');
                    listItem.className = heading.tagName === 'H2' ? 'mb-2' : 'mb-1 ms-3';

                    const link = document.createElement('a');
                    link.href = '#' + id;
                    link.textContent = heading.textContent;
                    link.className = 'text-decoration-none text-muted';
                    link.style.fontSize = heading.tagName === 'H2' ? '0.9rem' : '0.8rem';

                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        heading.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    });

                    listItem.appendChild(link);
                    tocList.appendChild(listItem);
                });

                toc.appendChild(tocList);
            } else if (toc) {
                toc.innerHTML = '<p class="text-muted small mb-0">No headings found</p>';
            }
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                                imageObserver.unobserve(img);
                            }
                        }
                    });
                });

                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
    @endpush
</div>
