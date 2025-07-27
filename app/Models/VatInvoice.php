<?php
// app/Models/VatInvoice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VatInvoice extends Model
{
    use SoftDeletes;

    protected $table = "vat_invoices"; // <-- Renamed table
    protected $primaryKey = "id";

    protected $fillable = [
        "party_id",
        "invoice_date",
        "invoice_no",
        "item_description",
        "total_amount",
        "vat_rate",       // <-- Updated
        "vat_amount",     // <-- Updated
        "net_amount",
        "declaration",
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}