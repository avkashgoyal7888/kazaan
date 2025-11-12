@push('css')
<title>Kazan Lifestyle: Login</title>
<meta name="description"
        content="Login to your Kazaan Lifestyle account to access exclusive features, manage your profile, and explore personalized content. Secure and easy sign-in for all users.">
@endpush

<!-- Tour Booking Start -->
<div class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <h5 class="section-booking-title mb-5 pe-3">Log In to Explore Exclusive Escapes</h5>
                <p class="mb-4 text-white">Discover a world where every journey is carefully curated, every destination
                    handpicked, and every stay defined by elegance. At Kazan Lifestyle, we specialize in luxury resorts,
                    premium hotels, and personalized tour packages designed to meet your highest expectations.</p>
                <p class="mb-4 text-white">Accessing our curated collection of luxury getaways is just one step away. As
                    a registered member, you'll unlock full details of world-class resorts, seasonal offers, private
                    tour itineraries, and member-only benefits. From hidden island retreats to iconic city experiences,
                    everything is tailored to your travel dreams.</p>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <h1 class="mb-3 text-white">Login</h1>
                <p class="mb-4 text-white">Welcome to Kazan Lifestyle – Your Gateway to Luxury Travel</p>
                
                <form wire:submit.prevent="login">
                    <div class="row g-3">
                        <!-- General Error Message -->
                        @if($generalError)
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    {{ $generalError }}
                                </div>
                            </div>
                        @endif

                        <!-- Login ID Field -->
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-floating">
                                <input type="text" 
                                       class="form-control border-0 bg-white @error('user_id') is-invalid @enderror" 
                                       wire:model.defer="user_id"
                                       placeholder="Login ID"
                                       id="user_id">
                                <label for="user_id">Login ID (Email/Username)</label>
                                @if($user_idError)
                                    <span class="text-danger d-block mt-2">{{ $user_idError }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-floating">
                                <input type="password" 
                                       class="form-control border-0 bg-white @error('password') is-invalid @enderror" 
                                       wire:model.defer="password"
                                       placeholder="Password"
                                       id="password">
                                <label for="password">Password</label>
                                @if($passwordError)
                                    <span class="text-danger d-block mt-2">{{ $passwordError }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3 text-white" 
                                    type="submit"
                                    wire:loading.attr="disabled">
                                <span wire:loading.remove>Login</span>
                                <span wire:loading>
                                    <i class="spinner-border spinner-border-sm me-2" role="status"></i>
                                    Logging in...
                                </span>
                            </button>
                        </div>

                        <!-- Additional Links -->
                        <div class="col-12 text-center mt-3">
                            <p class="text-white">
                                Don't have an account? 
                                <a href="#" class="text-decoration-none text-primary">Register here</a>
                            </p>
                            <p class="text-white">
                                <a href="#" class="text-decoration-none text-primary">Forgot your password?</a>
                            </p>
                            <p class="text-white">
                                Admin user? 
                                <a href="#" class="text-decoration-none text-warning">
                                    <i class="fas fa-user-shield me-1"></i>Admin Login
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Tour Booking End -->