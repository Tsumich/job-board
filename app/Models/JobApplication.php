<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    public function work():BelongsTo
    {
        return $this->belongsTo(Work::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
