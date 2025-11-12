<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $primaryKey = "id";

    protected $fillable = [
        "name",
        "email",
        "contact",
        "package",
        "amount",
        "trans_id",
        "mihpayid",
        "bank_ref_num",
        "payment_method",
        "status",
        "status_description",
        "error_message",
    ];
}
