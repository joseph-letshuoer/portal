<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    public function region(): BelongsTo
    {
        return $this->belongsTo(CompanyRegion::class);
    }

    public function tourUsers(): HasMany
    {
        return $this->hasMany(TourUser::class);
    }
}