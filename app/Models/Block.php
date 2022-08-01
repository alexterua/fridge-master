<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    const IS_FREE = 1;
    const IS_BUSY = 0;

    protected $table = 'blocks';
    protected $fillable = [
        'length',
        'width',
        'height',
        'is_free',
        'premis_id'
    ];

    public function premis()
    {
        return $this->belongsTo(Premis::class, 'premis_id', 'id', 'premises');
    }
}
