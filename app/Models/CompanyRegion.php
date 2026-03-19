<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CompanyRegion extends Model
{
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'company_region_countries');
    }

    public function warehouses(): HasMany
    {
        return $this->hasMany(CompanyWarehouse::class);
    }
}
