<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    CONST TYPE_CUSTOMER = 1;
    CONST TYPE_COMPANY_ADMIN = 2;
    CONST TYPE_COMPANY_SUPPORT = 3;
    CONST TYPE_SUPER_ADMIN = 4;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
