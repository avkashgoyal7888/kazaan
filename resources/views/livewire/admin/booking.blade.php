@push('css')
    <title>Booking's</title>
@endpush
<div>
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex justify-content-between align-items-center py-4"
                            id="booking-table">
                            <h3 class="mb-0">Booking's</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between py-3">
                                <div class="mr-auto p-2">
                                    <select class="form-select" id="exampleFormControlSelect1"
                                        aria-label="Default select example" wire:model.live="short">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="p-2">
                                    <div class="input-group input-group-merge" style="width:250px">
                                        <input type="text" class="form-control" placeholder="Search bookings..."
                                            wire:model.live.debounce.300ms="search" value="{{ $search }}">
                                        @if (!empty($search))
                                            <button class="btn btn-outline-secondary" type="button"
                                                wire:click="clearSearch">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <table class="table-bordered table-hover table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Membership No.</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $key => $booking)
                                        <tr>
                                            <td>{{ ($bookings->currentPage() - 1) * $bookings->perPage() + $key + 1 }}
                                            </td>
                                            <td>{{ Illuminate\Support\Str::title($booking->type) }}</td>
                                            <td>{{ $booking->membership_no }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->contact }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    wire:click="viewBooking({{ $booking->id }})">
                                                    <i class="bi bi-eye-fill fs-5"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $bookings->links(data: ['scrollTo' => '#booking-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Blog Modal -->
    @if ($showModal)
        <div class="modal-backdrop fade show" wire:click="closeModal" wire:ignore.self></div>
        <div class="modal fade show d-block livewire-modal my-5 py-5" tabindex="-1" role="dialog"
            wire:click="closeModal" wire:ignore.self
            style="background: linear-gradient(135deg,rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.6));backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-0" id="viewBookingLabel">Booking Details</h5>
                        <button type="button" class="btn-close position-absolute end-0 top-0 m-4 p-2"
                            wire:click="closeModal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body p-4">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-header border-0 bg-transparent pb-0">
                                            <h6 class="card-title text-primary mb-0">
                                                <i class="bi bi-person-circle me-2"></i>Guest Information
                                            </h6>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Guest Name</label>
                                                    <p class="fw-medium mb-0">{{ $guest ?: 'Not specified' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Membership No.</label>
                                                    <p class="fw-medium mb-0">{{ $membership_no ?: 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Contact</label>
                                                    <p class="fw-medium mb-0">{{ $contact ?: 'Not provided' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Email</label>
                                                    <p class="fw-medium mb-0">{{ $email ?: 'Not provided' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-header border-0 bg-transparent pb-0">
                                            <h6 class="card-title text-primary mb-0">
                                                <i class="bi bi-geo-alt me-2"></i>Booking Details
                                            </h6>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Booking Type</label>
                                                    <p class="fw-medium mb-0">
                                                        <span
                                                            class="badge bg-info text-dark">{{ $type ?: 'Standard' }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Destination</label>
                                                    <p class="fw-medium mb-0">{{ $destination ?: 'Not specified' }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label fw-bold small">Rooms</label>
                                                    <p class="fw-medium mb-0">
                                                        <i
                                                            class="bi bi-door-open text-primary me-1"></i>{{ $number_of_rooms ?: '1' }}
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label fw-bold small">Adults</label>
                                                    <p class="fw-medium mb-0">
                                                        <i
                                                            class="bi bi-people text-success me-1"></i>{{ $adults ?: '0' }}
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label fw-bold small">Children (Below 6)</label>
                                                    <p class="fw-medium mb-0">
                                                        <i
                                                            class="bi bi-person-hearts text-warning me-1"></i>{{ $child_below_6_years ?: '0' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-header border-0 bg-transparent pb-0">
                                            <h6 class="card-title text-primary mb-0">
                                                <i class="bi bi-calendar-range me-2"></i>Stay Duration
                                            </h6>
                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Check-in Date</label>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-calendar-plus text-success me-2"></i>
                                                        <p class="fw-medium mb-0">
                                                            {{ $check_in ? \Carbon\Carbon::parse($check_in)->format('M d, Y') : 'Not set' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold small">Check-out Date</label>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-calendar-minus text-danger me-2"></i>
                                                        <p class="fw-medium mb-0">
                                                            {{ $check_out ? \Carbon\Carbon::parse($check_out)->format('M d, Y') : 'Not set' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($check_in && $check_out)
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="alert alert-info d-flex align-items-center">
                                                            <i class="bi bi-info-circle me-2"></i>
                                                            <div>
                                                                <strong>Duration:</strong>
                                                                {{ \Carbon\Carbon::parse($check_in)->diffInDays(\Carbon\Carbon::parse($check_out)) }}
                                                                night(s)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="bi bi-clipboard-check me-2"></i>Booking Summary
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <small class="">Total Guests:</small>
                                                    <div class="fw-bold">
                                                        {{ ($adults ?: 0) + ($child_below_6_years ?: 0) }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="">Total Rooms:</small>
                                                    <div class="fw-bold">{{ $number_of_rooms ?: '1' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>

@push('scripts')
@endpush
