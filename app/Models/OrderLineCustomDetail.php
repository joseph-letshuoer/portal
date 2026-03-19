<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLineCustomDetail extends Model
{
    CONST UIEM = 1;
    CONST CIEM = 2;
    
    public function orderLine(): BelongsTo
    {
        return $this->belongsTo(OrderLine::class);
    }
}
