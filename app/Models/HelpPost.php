<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HelpPost extends Model
{
    /** @use HasFactory<\Database\Factories\HelpPostFactory> */
    use HasFactory;
    protected $fillable = [
        'user_name',
        'heading',
        'importance',
        'txt',
        'volunteer_id'
    ];

    protected $casts = [
        'importance' => 'boolean',
    ];

    /**
     * Get the volunteer associated with the help post.
     */
    public function volunteer(): BelongsTo
    {
        return $this->belongsTo(Volunteer::class);
    }
}
