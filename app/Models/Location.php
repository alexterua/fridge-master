<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    const DIFFERENCE_TEMPERATURE = 2;

    protected $table = 'locations';
    protected $fillable = ['name'];

    public function premises()
    {
        return $this->hasMany(Premis::class);
    }

    public function getCountOfFreeBlocks() : int
    {
        $countOfFreeBlocks = 0;
        $premises = $this->premises;
        foreach ($premises as $premis) {
            $blocks = $premis->blocks;
            foreach ($blocks as $block) {
                if ($block->is_free === 1)
                    $countOfFreeBlocks++;
            }
        }
        return $countOfFreeBlocks;
    }

    public function getCountOfFreeBlocksWithTemperature(int $temperature) : int
    {
        $countOfFreeBlocks = 0;
        $premises = $this->premises;
        foreach ($premises as $premis) {
            if ($premis->temperature >= -24 && $premis->temperature <= -1) {
                if ($premis->temperature >= $temperature - self::DIFFERENCE_TEMPERATURE &&
                    $premis->temperature <= $temperature + self::DIFFERENCE_TEMPERATURE) {
                    $blocks = $premis->blocks;
                    foreach ($blocks as $block) {
                        if ($block->is_free === 1)
                            $countOfFreeBlocks++;
                    }
                }
            }

        }
        return $countOfFreeBlocks;
    }
}
