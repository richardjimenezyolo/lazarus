<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $user_id
 * @property string $backpack_id
 * @property string $health_points
 * @property array  $position
 */
class Avatar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'backpack_id',
        'health_points',
        'position'
    ];

    protected $casts = [
        'position' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function backpack()
    {
        return $this->hasOne(Backpack::class);
    }

}
