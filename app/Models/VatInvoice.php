<?php
// app/Models/GstBill.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- Import the trait

class GstBill extends Model
{
    use SoftDeletes; // <-- Use the trait

    protected $table = "gst_bills";
    protected $primaryKey = "id";

    // The $fillable property is correct.
    protected $fillable = [
        "party_id", "invoice_date", "invoice_no", "item_description",
        "total_amount", "total_amount_usd", "cgst_rate", "sgst_rate",
        "igst_rate", "cgst_amount", "sgst_amount", "igst_amount",
        "tax_amount", "net_amount", "declaration",
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}