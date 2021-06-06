<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $avatar_id
 */
class Backpack extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar_id'
    ];


    public function items()
    {
        return $this->hasMany(ItemOwnership::class);
    }
}
