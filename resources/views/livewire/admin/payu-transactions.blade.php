@push('css')
    <title>Contact Us</title>
@endpush

<div>
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center py-3" id="contact-table">
                        <h3 class="mb-0">Payments</h3>
                    </div>

                    <div class="card-body">

                        <!-- Top Controls -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                            <!-- Sort Dropdown -->
                            <div class="d-flex align-items-center gap-2">
                                <label class="mb-0 fw-semibold">Show</label>
                                <select class="form-select form-select-sm w-auto" wire:model.live="short"
                                    aria-label="Default select example">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <!-- Search Box -->
                            <div class="input-group input-group-sm" style="max-width: 250px;">
                                <input type="text" class="form-control" placeholder="Search bookings..."
                                    wire:model.live.debounce.300ms="search" value="{{ $search }}">
                                @if (!empty($search))
                                    <button class="btn btn-outline-secondary" type="button" wire:click="clearSearch">
                                        <i class="bi bi-x"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Responsive Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Payu ID</th>
                                        <th>Bank Reference ID</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Status Description</th>
                                        <th>Error Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration + ($payments->currentPage() - 1) * $payments->perPage() }}</td>
                                            <td>{{ $payment->created_at->format('d/F/Y') }}</td>
                                            <td>{{ $payment->name }}</td>
                                            <td>{{ $payment->email }}</td>
                                            <td>{{ $payment->contact }}</td>
                                            <td>{{ $payment->package ?? 'NA' }}</td>
                                            <td>{{ $payment->amount ?? 'NA' }}</td>
                                            <td>{{ $payment->trans_id ?? 'NA' }}</td>
                                            <td>{{ $payment->mihpayid ?? 'NA' }}</td>
                                            <td>{{ $payment->bank_ref_num ?? 'NA' }}</td>
                                            <td>{{ $payment->payment_method ?? 'NA' }}</td>
                                            <td class="{{ $payment->status == 'success' ? 'text-success' : ($payment->status == 'failure' ? 'text-danger' : 'text-warning') }}">
                                                {{ ucfirst($payment->status) }}
                                            </td>
                                            <td>{{ $payment->status_description ?? 'NA' }}</td>
                                            <td>{{ $payment->error_message ?? 'NA' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="text-center text-muted py-3">
                                                No Contact Us found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $payments->links(data: ['scrollTo' => '#contact-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
