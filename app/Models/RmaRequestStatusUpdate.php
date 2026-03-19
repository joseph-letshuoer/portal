<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RmaRequestStatusUpdate extends Model
{
    public function rmaRequest(): BelongsTo
    {
        return $this->belongsTo(RmaRequest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
