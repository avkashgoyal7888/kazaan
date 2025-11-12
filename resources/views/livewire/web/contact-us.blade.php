<div>
    @push('css')
        <title>Contact Us | Kazaan Lifestyle</title>
        <meta name="description"
            content="Have questions or need help planning your trip? Contact Kazaan Lifestyle for expert travel assistance, custom bookings, and prompt support. We're here to help you travel better.">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @endpush
    <!-- Breadcrumb Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background:linear-gradient(rgba(19, 146, 242, 0.2)), url('https://wallpapershome.com/images/pages/pic_h/666.jpg');">
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h3 class="display-3 mb-4 text-white">Contact Us</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('web.home') }}">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact Us</li>
                </ol>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto mb-5 text-center" style="max-width: 900px;">
                <h5 class="section-title px-3">Contact Us</h5>
                <h1 class="mb-0">Contact For Any Query</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-4">
                    <div class="rounded bg-white p-4">
                        <div class="mb-4 text-center">
                            <i class="fa fa-map-marker-alt fa-3x text-contact"></i>
                            <h4 class="text-contact">
                                <Address></Address>
                            </h4>
                            <p class="mb-0">Vagator, Goa (403519)</p>
                        </div>
                        <div class="mb-4 text-center">
                            <i class="fa fa-phone-alt fa-3x text-contact mb-3"></i>
                            <h4 class="text-contact">Mobile</h4>
                            <p class="mb-0">+91-9209412692</p>
                        </div>

                        <div class="text-center">
                            <i class="fa fa-envelope-open fa-3x text-contact mb-3"></i>
                            <h4 class="text-contact">Email</h4>
                            <p class="mb-0">info@kazanlifestyle.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h3 class="mb-2">We'd love to hear from you</h3>
                    <p class="mb-4">Send us a message and we'll respond as soon as possible</p>
                    <form wire:submit.prevent="contactUsSubmit">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" wire:model="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                    @error('name')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control border-0" wire:model="contact"
                                        placeholder="91XXXXXXXX">
                                    <label for="contact">Your Contact</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" wire:model="email"
                                        placeholder="xyz@xyz.com">
                                    <label for="email">Your Email</label>
                                    @error('email')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" wire:model="subject"
                                        placeholder="Subject">
                                    <label for="subject">Subject</label>
                                    @error('subject')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="Leave a message here" wire:model="message" style="height: 160px"></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <span class="text-danger d-block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" {{ $isSubmitting ? 'disabled' : '' }}>
                                    {{ $isSubmitting ? 'Sending...' : 'Send Message' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('livewire:initialized', function() {
                Livewire.on('show-success-alert', function() {
                    Swal.fire({
                        title: 'Success',
                        text: 'Sent Successfully...',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then((res) => {
                        if (res.isConfirmed) {
                            window.location.href = "{{ route('web.home') }}";
                        }
                    });
                });

                Livewire.on('show-error-alert', function(data) {
                    Swal.fire({
                        title: 'Error',
                        text: data.message,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                });
            });
        </script>
        </script>
    @endpush
</div>