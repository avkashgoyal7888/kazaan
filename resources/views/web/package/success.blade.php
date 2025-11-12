@extends('web.layouts.app1')

@section('css')
    <title>Payment Success | Kazaan Lifestyle</title>
    <style>
        .success-card {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .success-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            padding: 3rem 2rem;
            text-align: center;
            color: white;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .success-body {
            padding: 2rem;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-label {
            color: #6c757d;
            font-weight: 500;
        }

        .detail-value {
            color: #212529;
            font-weight: 600;
        }

        .alert-custom {
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
        }
    </style>
@stop

@section('content')
    <div class="d-flex justify-content-center mt-lg-5 py-lg-5">
        <div class="success-card">
            <div class="success-header">
                <div class="success-icon">
                    <i class="bi bi-check-circle" style="font-size: 3rem;"></i>
                </div>
                <h2 class="mb-2">Payment Successful!</h2>
                <p class="mb-0">Your payment has been processed successfully</p>
            </div>

            <div class="success-body">
                <h5 class="mb-3">Transaction Details</h5>

                <div class="detail-row">
                    <span class="detail-label">Transaction ID</span>
                    <span class="detail-value">{{ strtoupper($data['txnid']) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Payment ID</span>
                    <span class="detail-value">{{ strtoupper($data['mihpayid']) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Amount Paid</span>
                    <span class="detail-value text-success">₹{{ number_format($data['amount'], 2) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Customer Name</span>
                    <span class="detail-value">{{ strtoupper($data['firstname']) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ strtoupper($data['email']) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Contact</span>
                    <span class="detail-value">{{ strtoupper($data['phone']) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value">
                        <span class="badge bg-success">{{ strtoupper($data['status']) }}</span>

                    </span>
                </div>

                @if (isset($isHashValid) && !$isHashValid)
                    <div class="alert alert-warning alert-custom">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> verification failed. Please contact support.
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section('js')
@stop
