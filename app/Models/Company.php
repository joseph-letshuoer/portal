<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    CONST TYPE_MANUFACTURER = 1;
    CONST TYPE_RETAILER = 2;
    CONST TYPE_DISTRIBUTOR = 3;
    CONST TYPE_OEM = 4;

    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    // Manufacturer company owned brands
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function regions(): HasMany
    {
        return $this->hasMany(CompanyRegion::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function warehouses(): HasMany
    {
        return $this->hasMany(CompanyWarehouse::class);
    }

    public function salesChannels(): HasMany
    {
        return $this->hasMany(SalesChannel::class);
    }

    // Retail companies representing brands in sales channels
    public function salesBrands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brand_sales_channels');
    }

    public function manufacturerCompanies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_oem_companies', 'oem_company_id', 'company_id');
    }

    public function oemCompanies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_oem_companies', 'company_id', 'oem_company_id');
    }
}
