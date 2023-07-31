<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\{Model, Prunable, SoftDeletes};

class Question extends Model
{
    use HasFactory;
    use Prunable;
    use SoftDeletes;

    public function prunable()
    {
        return static::where('deleted_at', '<=', now()
            ->subMonths(1))
            ->forceDelete();
    }

    protected $casts = [
        'draft' => 'boolean',
    ];

    /**
     * return HasMany<Vote>
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /*** relationships ***/
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
