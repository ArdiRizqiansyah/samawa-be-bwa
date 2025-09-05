<?php

namespace App\Models;

use App\Models\WeddingPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeddingTestimonial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'occupation', 
        'message',
        'wedding_package_id'
    ];

    public function weddingPackage(): BelongsTo
    {
        return $this->belongsTo(WeddingPackage::class);
    }
}
