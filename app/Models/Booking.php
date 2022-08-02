<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    const STATUS_WAITING = 0;
    const STATUS_PAID = 1;

    protected $table = 'bookings';
    protected $fillable = [
        'status',
        'count_of_blocks',
        'product_volume',
        'storage_temperature',
        'expiration_date',
        'storage_cost',
        'storage_cost',
        'access_code',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }
}
