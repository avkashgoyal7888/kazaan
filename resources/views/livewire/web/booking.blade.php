@push('css')
    <title>Booking | Kazaan Lifestyle</title>
    <meta name="description"
        content="Book your next travel experience with Kazaan Lifestyle – offering premium stays, curated trips, and seamless booking for destinations worldwide.">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

<div>
    <!-- Breadcrumb Start -->
    <div class="container-fluid bg-breadcrumb" style="background:linear-gradient(rgba(19, 146, 242, 0.2)), url('https://m.media-amazon.com/images/I/71Wz7I1d7BL.jpg');">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Online Booking</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('web.home') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Online Booking</li>
            </ol>    
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Tour Booking Start -->
    <div class="container-fluid booking py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <h5 class="section-booking-title pe-3">Booking</h5>
                    <h1 class="text-white mb-4">Online Booking</h1>
                    <p class="text-white mb-4"><b>Plan Your Perfect Getaway with Ease</b></p>
                    <p class="text-white mb-4">Ready to explore luxury like never before? Fill out the form below to book your dream vacation with KazaanLifestyle — where every journey is tailored to your taste.</p>
                    <p class="text-white mb-4"><b>Simple Booking. Seamless Travel.</b></p>
                    <p class="text-white mb-4">From handpicked resorts to curated experiences, your next adventure starts here. Let us know your preferences, and we'll take care of the rest.</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <h1 class="text-white mb-3">Book A Tour Deals</h1>
                    <p class="text-white mb-4">Get Upto<span class="text-warning"> 50% Off</span> On Your First Adventure Trip With Kazaan. Get More Deal Offers Here.</p>
                    
                    <form wire:submit="submit">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0 @error('type') is-invalid @enderror" 
                                            wire:model.live="type" id="type">
                                        <option value="">Select Type</option>
                                        <option value="member">Member</option>
                                        <option value="non-member">Non Member</option>
                                    </select>
                                    <label for="type">Select Type</label>
                                    @error('type')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control bg-white border-0 @error('membership_no') is-invalid @enderror" 
                                           wire:model="membership_no" 
                                           id="membership_no"
                                           placeholder="Membership Number"
                                           {{ $type === 'non-member' ? 'disabled' : '' }}>
                                    <label for="membership_no">Membership Number</label>
                                    @error('membership_no')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control bg-white border-0 @error('name') is-invalid @enderror" 
                                           wire:model="name" 
                                           id="name"
                                           placeholder="Member Name">
                                    <label for="name">Member Name</label>
                                    @error('name')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control bg-white border-0 @error('guest') is-invalid @enderror" 
                                           wire:model="guest" 
                                           id="guest"
                                           placeholder="Guest Name (If Any)">
                                    <label for="guest">Guest Name (If Any)</label>
                                    @error('guest')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control bg-white border-0 @error('contact') is-invalid @enderror" 
                                           wire:model="contact" 
                                           id="contact"
                                           placeholder="Mobile No.">
                                    <label for="contact">Mobile No.</label>
                                    @error('contact')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="email" 
                                           class="form-control bg-white border-0 @error('email') is-invalid @enderror" 
                                           wire:model="email" 
                                           id="email"
                                           placeholder="Email ID">
                                    <label for="email">Email ID</label>
                                    @error('email')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control bg-white border-0 @error('destination') is-invalid @enderror" 
                                           wire:model="destination" 
                                           id="destination"
                                           placeholder="Destination">
                                    <label for="destination">Destination</label>
                                    @error('destination')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" 
                                           class="form-control bg-white border-0 @error('number_of_rooms') is-invalid @enderror" 
                                           wire:model="number_of_rooms" 
                                           id="number_of_rooms"
                                           placeholder="No. Of Rooms" min="1">
                                    <label for="number_of_rooms">No. Of Rooms</label>
                                    @error('number_of_rooms')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" 
                                           class="form-control bg-white border-0 @error('adults') is-invalid @enderror" 
                                           wire:model="adults" 
                                           id="adults"
                                           placeholder="No. Of Adults" min="1">
                                    <label for="adults">Adults</label>
                                    @error('adults')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" 
                                           class="form-control bg-white border-0 @error('child_below_6_years') is-invalid @enderror" 
                                           wire:model="child_below_6_years" 
                                           id="child_below_6_years"
                                           placeholder="Child Below 6 Years" min="0">
                                    <label for="child_below_6_years">Child Below 6 Years</label>
                                    @error('child_below_6_years')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" 
                                           class="form-control bg-white border-0 @error('check_in') is-invalid @enderror" 
                                           wire:model="check_in" 
                                           id="check_in"
                                           min="{{ date('Y-m-d') }}">
                                    <label for="check_in">Check-In</label>
                                    @error('check_in')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" 
                                           class="form-control bg-white border-0 @error('check_out') is-invalid @enderror" 
                                           wire:model="check_out" 
                                           id="check_out"
                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                    <label for="check_out">Check-Out</label>
                                    @error('check_out')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Book Now</span>
                                    <span wire:loading>
                                        <i class="spinner-border spinner-border-sm me-2" role="status"></i>
                                        Processing...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Booking End -->
</div>

@push('js')
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('livewire:initialized', function() {
        // Listen for booking success event
        Livewire.on('booking-success', function(data) {
            Swal.fire({
                title: data.title,
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = data.redirect;
                }
            });
        });

        // Listen for booking error event
        Livewire.on('booking-error', function(data) {
            Swal.fire({
                title: data.title,
                text: data.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
</script>
@endpush