<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $name
 * @property string $description
 * @property int    $hit_points
 * @property int    $defensive_points
 * @property string $image
 */
class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'hit_points',
        'defensive_points',
        'image',
    ];
}
