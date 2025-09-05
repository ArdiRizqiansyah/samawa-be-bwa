<?php

namespace App\Models;

use App\Models\WeddingPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeddingPhoto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'photo',
        'wedding_package_id',
    ];

    public function weddingPackage(): BelongsTo
    {
        return $this->belongsTo(WeddingPackage::class);
    }
}
