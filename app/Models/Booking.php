<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
        'type',
        'membership_no',
        'name',
        'guest',
        'contact',
        'email',
        'destination',
        'number_of_rooms',
        'adults',
        'child_below_6_years',
        'check_in',
        'check_out'
    ];
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        return (is_null($value) || $value === '') ? 'N/A' : $value;
    }
}
