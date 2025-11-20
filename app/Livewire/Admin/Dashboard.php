<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Resort;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        // Total Counts for Cards
        $totalBookings = Booking::count();
        $totalBlogs = Blog::count();
        $totalResorts = Resort::count();
        $totalContactUs = Contact::count();
        $totalPayments = Payment::count();
        $totalPaymentAmount = Payment::sum('amount');

        // Monthly Booking Data (Last 12 months)
        $monthlyBookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Yearly Booking Data (Last 5 years)
        $yearlyBookings = Booking::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->take(5)
            ->pluck('count', 'year')
            ->toArray();

        // Monthly Payment Data (Last 12 months)
        $monthlyPayments = Payment::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Yearly Payment Data (Last 5 years)
        $yearlyPayments = Payment::selectRaw('YEAR(created_at) as year, SUM(amount) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->take(5)
            ->pluck('total', 'year')
            ->toArray();

        // Fill missing months with 0
        $monthlyBookingData = [];
        $monthlyPaymentData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyBookingData[] = $monthlyBookings[$i] ?? 0;
            $monthlyPaymentData[] = $monthlyPayments[$i] ?? 0;
        }

        return view('livewire.admin.dashboard', [
            'totalBookings' => $totalBookings,
            'totalBlogs' => $totalBlogs,
            'totalResorts' => $totalResorts,
            'totalContactUs' => $totalContactUs,
            'totalPayments' => $totalPayments,
            'totalPaymentAmount' => $totalPaymentAmount,
            'monthlyBookingData' => $monthlyBookingData,
            'yearlyBookings' => $yearlyBookings,
            'monthlyPaymentData' => $monthlyPaymentData,
            'yearlyPayments' => $yearlyPayments,
        ])->layout('admin.layouts.app');
    }
}