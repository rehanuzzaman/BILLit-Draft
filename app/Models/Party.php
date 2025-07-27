<?php
// app/Models/Party.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- Import the trait

class Party extends Model
{
    use SoftDeletes; // <-- Use the trait for consistency

    protected $table = 'parties';
    protected $primaryKey = 'id';

    // The $fillable property is correct.
    protected $fillable = [
        'party_type', 'full_name', 'phone_no', 'address',
        'account_holder_name', 'account_no', 'bank_name',
        'ifsc_code', 'zip_code', 'state', 'branch_address',
    ];
}
