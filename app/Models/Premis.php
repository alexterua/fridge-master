<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premis extends Model
{
    use HasFactory;

    protected $table = 'premises';
    protected $fillable = [
        'temperature',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id', 'locations');
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}
