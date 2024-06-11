<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['building_id', 'renter_id', 'start_date', 'end_date', 'total_amount'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}