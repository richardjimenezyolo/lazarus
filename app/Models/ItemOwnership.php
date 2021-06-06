<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $avatar_id
 * @property int $backpack_id
 * @property int $item_id
 */
class ItemOwnership extends Model
{
    use HasFactory;

    protected $with = ['item'];

    protected $fillable = [
        'avatar_id',
        'backpack_id',
        'item_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
