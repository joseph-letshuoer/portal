<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RmaRequestStatus extends Model
{
    CONST REQUESTED = 1;
    CONST ONGOING_UPDATED = 2;
    CONST ONGOING_REPLIED = 3;
    CONST ACCEPTED = 4;
    CONST RETURNING = 5;
    CONST RETURNED = 6;
    CONST PROCESSING = 7;
    CONST FULFILLED = 8;
    CONST COMPLETED = 9;

    public function rmaRequests(): HasMany
    {
        return $this->hasMany(RmaRequest::class, 'status_id');
    }
}
