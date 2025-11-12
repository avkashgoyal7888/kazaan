@extends('web.layouts.app1')
@section('css')
    <title>Travel Packages | Kazaan Lifestyle</title>
    <meta name="description"
        content="Browse exclusive travel packages from Kazaan Lifestyle. From luxury escapes to adventure tours, find curated deals that match your dream vacation needs.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        @media (max-width: 576px) {
            .payment-modal .modal-dialog {
                margin: 0.5rem !important;
                max-width: calc(100% - 1rem) !important;
            }

            .payment-modal .modal-header {
                padding: 0.875rem 1rem !important;
            }

            .payment-modal .modal-title {
                font-size: 1rem !important;
                padding-right: 2rem;
            }

            .payment-modal .modal-body {
                padding: 1rem !important;
            }

            .payment-modal .modal-footer {
                padding: 0.875rem 1rem !important;
                flex-direction: column;
                gap: 0.5rem;
            }

            .payment-modal .modal-footer button {
                width: 100% !important;
                margin: 0 !important;
            }

            .payment-modal .form-control {
                font-size: 16px !important;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .payment-modal .modal-dialog {
                max-width: 540px !important;
                margin: 1rem auto !important;
            }
        }

        .payment-modal .modal-content {
            animation: slideUp 0.3s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .payment-modal .form-control:focus {
            border-color: #1392f2;
            box-shadow: 0 0 0 0.2rem rgba(19, 146, 242, 0.15);
        }
    </style>
@stop

@section('content')
    <div>
        <!-- Breadcrumb -->
        <div class="container-fluid bg-breadcrumb"
            style="background:linear-gradient(rgba(19, 146, 242, 0.2)), url('https://wallpapershome.com/images/pages/pic_h/666.jpg');">
            <div class="container py-5 text-center" style="max-width: 900px;">
                <h3 class="display-3 mb-4 text-white">Our Packages</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('web.home') }}">Home</a></li>
                    <li class="breadcrumb-item active text-white">Packages</li>
                </ol>
            </div>
        </div>

        <!-- Ownership Benefits -->
        <div class="container-fluid services-content-box">
            <div class="container">
                <h1 class="mb-4 text-center">Explore Ownership Benefits</h1>
                <ul>
                    <li>With a Kazaan Lifestyle Ownership, you get to holiday 6 nights/ 7 days Worldwide in luxurious
                        resorts, hotels and many more.</li>
                    <li>Worldwide in luxurious resorts, hotels any many more</li>
                    <li>Accommodation in all our tieup properties.</li>
                    <li>AMC of Rs 9500 + GST/- per year at the time of booking.</li>
                    <li>You have an access to a wide network of destinations across the world – 6100+ amazing Kazaan
                        Lifestyle Affiliated resorts/hotels across India and abroad – 5,00,000+ amazing Deal on Kazaan
                        Lifestyle Travel resorts/hotels across the World.</li>
                    <li>Your Ownership gives you flexibility to break 6 Night/7 days annual holidays in smaller gateways.
                    </li>
                    <li>It offers you choice of accommodation basis the family size – from studio to a 1 bedroom apartment.
                    </li>
                    <li>Enjoy excellent rooms, amenities and signature in-resort holiday experiences with your family.</li>
                    <li>Discounts on restaurants with Dining Plus "Privilege Card".</li>
                </ul>
            </div>
        </div>

        <!-- Banner -->
        <div class="container-fluid packages-banner py-5">
            <div class="container py-5 text-center">
                <div class="mx-auto text-center" style="max-width: 900px;">
                    <h1 class="mb-4 text-white">Holiday Ownership Exclusive All-in-One Benefit at Special Price Offer for a
                        Limited Time</h1>
                </div>
            </div>
        </div>

        <!-- Packages -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto mb-5 text-center" style="max-width: 900px;">
                    <h2 class="section-title px-3">Our Packages</h2>
                    <h4 class="mb-0">Season Category: Prices may vary according to Season (Red, White & Blue)</h4>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-4">
                        <div class="red-package">
                            <h5>25 Years</h5>
                            <h4><i class="bi bi-fire me-2"></i>Red Season</h4>
                            <p>Studio: ₹12,25,000</p>
                            <p>1 BR: ₹15,25,000</p>
                            <p>2 BR: ₹18,25,000</p>
                            <p><i class="bi bi-check2-square"></i> Full Payment Get 10% Discount</p>
                            <p><i class="bi bi-check-circle"></i> 50% Down payment and Rest in 12 No Cost EMI.</p>
                            <p><i class="bi bi-check2-all"></i> AMC are applicable according to apartment.</p>
                            <p><i class="bi bi-telephone-fill"></i> Call us for full information</p>
                            <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-sm btn-warning book-package-btn"
                                data-package="Red Season">
                                Book Your Package
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="white-package">
                            <h5>25 Years</h5>
                            <h4><i class="bi bi-snow2 me-2"></i>White Season</h4>
                            <p>Studio: ₹10,25,000</p>
                            <p>1 BR: ₹11,45,000</p>
                            <p>2 BR: ₹14,25,000</p>
                            <p><i class="bi bi-check2-square"></i> Full Payment Get 10% Discount</p>
                            <p><i class="bi bi-check-circle"></i> 50% Down payment and Rest in 12 No Cost EMI.</p>
                            <p><i class="bi bi-check2-all"></i> AMC are applicable according to apartment.</p>
                            <p><i class="bi bi-telephone-fill"></i> Call us for full information</p>
                            <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-sm btn-warning book-package-btn"
                                data-package="White Season">
                                Book Your Package
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="blue-package">
                            <h5>25 Years</h5>
                            <h4><i class="bi bi-water me-2"></i>Blue Season</h4>
                            <p>Studio: ₹8,25,000</p>
                            <p>1 BR: ₹10,45,000</p>
                            <p>2 BR: ₹12,25,000</p>
                            <p><i class="bi bi-check2-square"></i> Full Payment Get 10% Discount</p>
                            <p><i class="bi bi-check-circle"></i> 50% Down payment and Rest in 12 No Cost EMI.</p>
                            <p><i class="bi bi-check2-all"></i> AMC are applicable according to apartment.</p>
                            <p><i class="bi bi-telephone-fill"></i> Call us for full information</p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-sm btn-warning book-package-btn"
                                data-package="Blue Season">
                                Book Your Package
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Payment Modal -->
        <div class="modal fade payment-modal" id="paymentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 600px;">
                <div class="modal-content" style="border-radius: 12px; overflow: hidden;">
                    <div class="modal-header"
                        style="background: linear-gradient(135deg, #0d6efd 0%, #1392f2 100%); color: white; padding: 1rem 1.5rem;">
                        <h5 class="modal-title fw-semibold mb-0 text-white">
                            <i class="bi bi-cash-coin me-2"></i><span id="modalTitle">Package</span> Payment
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="paymentForm">
                        @csrf
                        <input type="hidden" name="productinfo" id="productinfo">
                        <div class="modal-body" style="max-height: 70vh; overflow-y: auto; padding: 1.5rem;">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold mb-1">
                                        <i class="bi bi-person-circle text-primary me-2"></i>Full Name
                                    </label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                        required>
                                    <div class="invalid-feedback">Please enter your name (min 3 characters)</div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold mb-1">
                                        <i class="bi bi-envelope text-primary me-2"></i>Email Address
                                    </label>
                                    <input type="email" name="email" class="form-control" placeholder="xyz@example.com"
                                        required>
                                    <div class="invalid-feedback">Please enter a valid email</div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold mb-1">
                                        <i class="bi bi-telephone text-primary me-2"></i>Contact Number
                                    </label>
                                    <input type="tel" name="contact" class="form-control"
                                        placeholder="Enter mobile number" pattern="[0-9]{10}" maxlength="10" required>
                                    <div class="invalid-feedback">Please enter a valid 10-digit mobile number</div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold mb-1">
                                        <i class="bi bi-currency-rupee text-primary me-2"></i>Amount
                                    </label>
                                    <input type="number" name="amount" class="form-control" placeholder="Enter amount"
                                        step="0.01" min="1" required>
                                    <div class="invalid-feedback">Please enter a valid amount</div>
                                </div>
                            </div>

                            <div class="alert alert-info small mb-0 mt-3">
                                <i class="bi bi-info-circle me-2"></i>
                                Please ensure your details are correct before proceeding.
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="padding: 1rem 1.5rem; background-color: #f8f9fa; border-top: 1px solid #dee2e6;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="submitBtn">
                                <i class="bi bi-credit-card me-1"></i> Proceed to Pay
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="loaderModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 p-5 text-center shadow-lg">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <h5 class="fw-semibold mb-2">Redirecting to Payment Gateway...</h5>
                    <p class="text-muted small mb-0">Please do not refresh or close this window.</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.book-package-btn').on('click', function() {
                const packageName = $(this).data('package');
                $('#modalTitle').text(packageName);
                $('#productinfo').val(packageName);
                $('#paymentModal').modal('show');
            });
            $('#paymentForm').on('submit', function(e) {
                e.preventDefault();
                $(this).find('.form-control').removeClass('is-invalid');
                const formData = {
                    name: $('input[name="name"]').val().trim(),
                    email: $('input[name="email"]').val().trim(),
                    contact: $('input[name="contact"]').val().trim(),
                    amount: $('input[name="amount"]').val().trim(),
                    productinfo: $('#productinfo').val(),
                    _token: $('input[name="_token"]').val()
                };
                let isValid = true;
                if (formData.name.length < 3) {
                    $('input[name="name"]').addClass('is-invalid');
                    isValid = false;
                }

                if (!formData.email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                    $('input[name="email"]').addClass('is-invalid');
                    isValid = false;
                }

                if (!formData.contact.match(/^[0-9]{10}$/)) {
                    $('input[name="contact"]').addClass('is-invalid');
                    isValid = false;
                }

                if (parseFloat(formData.amount) < 1) {
                    $('input[name="amount"]').addClass('is-invalid');
                    isValid = false;
                }

                if (!isValid) {
                    return false;
                }
                $('#submitBtn').prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm me-1"></span> Processing...'
                );
                $.ajax({
                    url: '{{ route('web.packages.payment.process') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log('✅ Payment response:', response);

                        if (response.success) {
                            $('#paymentModal').modal('hide');
                            $('#loaderModal').modal('show');
                            setTimeout(function() {
                                redirectToPayU(response);
                            }, 500);
                        } else {
                            alert(response.message || 'Payment initialization failed');
                            $('#submitBtn').prop('disabled', false).html(
                                '<i class="bi bi-credit-card me-1"></i> Proceed to Pay'
                            );
                        }
                    },
                    error: function(xhr, status, error) {

                        let errorMsg = 'Payment initialization failed. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        $('#submitBtn').prop('disabled', false).html(
                            '<i class="bi bi-credit-card me-1"></i> Proceed to Pay'
                        );
                    }
                });
            });

            function redirectToPayU(response) {
                console.log('🚀 Redirecting to PayU...');
                console.log('PayU URL:', response.payuUrl);
                const form = $('<form>', {
                    method: 'POST',
                    action: response.payuUrl,
                    style: 'display:none;'
                });
                const params = {
                    key: response.key,
                    txnid: response.txnid,
                    amount: response.amount,
                    productinfo: response.productinfo,
                    firstname: response.firstname,
                    email: response.email,
                    phone: response.phone,
                    surl: response.surl,
                    furl: response.furl,
                    hash: response.hash
                };

                $.each(params, function(key, value) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: key,
                        value: value
                    }).appendTo(form);
                    console.log(`  ➜ ${key}: ${value}`);
                });
                form.appendTo('body');
                setTimeout(function() {
                    form.submit();
                }, 100);
            }
            $('#paymentModal').on('hidden.bs.modal', function() {
                $('#paymentForm')[0].reset();
                $('#paymentForm').find('.form-control').removeClass('is-invalid');
                $('#submitBtn').prop('disabled', false).html(
                    '<i class="bi bi-credit-card me-1"></i> Proceed to Pay'
                );
            });
        });
    </script>
@stop
