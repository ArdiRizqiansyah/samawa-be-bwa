<?php

namespace App\Models;

use App\Models\BonusPackage;
use App\Models\WeddingPackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeddingBonusPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'weeding_package_id',
        'bonus_package_id',
    ];

    public function weedingPackage(): BelongsTo
    {
        return $this->belongsTo(WeddingPackage::class);
    }

    public function bonusPackage(): BelongsTo
    {
        return $this->belongsTo(BonusPackage::class);
    }
}
