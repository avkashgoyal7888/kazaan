@extends('web.layouts.app1')

@section('css')
    <title>Payment Failed | Kazaan Lifestyle</title>
    <style>
        .failed-card {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .failed-header {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            padding: 3rem 2rem;
            text-align: center;
            color: white;
        }

        .failed-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            animation: shake 0.5s ease-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-10px);
            }

            75% {
                transform: translateX(10px);
            }
        }

        .failed-body {
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

        .error-box {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
        }
    </style>
@stop

@section('content')
    <div class="d-flex justify-content-center mt-lg-5 py-lg-5">
        <div class="failed-card">
            <div class="failed-header">
                <div class="failed-icon">
                    <i class="bi bi-x-circle" style="font-size: 3rem;"></i>
                </div>
                <h2 class="mb-2">Payment Failed</h2>
                <p class="mb-0">Unfortunately, your payment could not be processed</p>
            </div>

            <div class="failed-body">
                @if (isset($error) && $error)
                    <div class="error-box">
                        <strong><i class="bi bi-exclamation-triangle me-2"></i>Error:</strong>
                        {{ $error }}
                    </div>
                @endif

                <h5 class="mb-3">Transaction Details</h5>

                <div class="detail-row">
                    <span class="detail-label">Transaction ID</span>
                    <span class="detail-value">{{ strtoupper($data['txnid']) }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Amount</span>
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
                        <span class="badge bg-danger">{{ strtoupper($data['status']) }}</span>
                    </span>
                </div>

                <div class="alert alert-info mt-4">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>What to do next?</strong>
                    <ul class="mb-0 mt-2">
                        <li>Check your payment details and try again</li>
                        <li>Ensure sufficient balance in your account</li>
                        <li>Contact your bank if the issue persists</li>
                        <li>Contact our support team for assistance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop
