@push('css')
    <title>Kazan Lifestyle: Admin Login</title>
    <meta name="description"
        content="Admin login for Kazan Lifestyle platform. Access the admin dashboard to manage users, bookings, resorts, and other critical content. Secure access for administrators only.">
@endpush
<div class="container-fluid booking d-flex justify-content-center align-items-center" style="height: 100dvh;">
    <div class="container">
        <div class="row justify-content-center align-items-center g-5">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h1 class="mb-3 text-white">Admin Login</h1>
                <form wire:submit.prevent="login">
                    <div class="row g-3">
                        @if ($generalError)
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    {{ $generalError }}
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" id="user_id" placeholder="Admin ID" wire:model.defer="user_id"
                                    class="form-control @error('user_id') is-invalid @enderror border-0 bg-white">
                                <label for="user_id">Admin ID (Email/Username)</label>
                                @if ($user_idError)
                                    <span class="text-danger d-block mt-2">{{ $user_idError }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="password" id="password" placeholder="Password" wire:model.defer="password"
                                    class="form-control @error('password') is-invalid @enderror border-0 bg-white">
                                <label for="password">Password</label>
                                @if ($passwordError)
                                    <span class="text-danger d-block mt-2">{{ $passwordError }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-3 text-white"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>Login</span>
                                <span wire:loading>
                                    <i class="spinner-border spinner-border-sm me-2" role="status"></i>
                                    Logging in...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Admin Login Section End -->
