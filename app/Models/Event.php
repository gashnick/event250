<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'events';

    protected $fillable = [
        'name',
        'type',
        'time',
        'date',
        'venue',
        'organizer_id',
        'description',
        'status',
        'thumbnail',
    ];

    public function organizers(): HasMany
    {
        return $this->hasMany(Organizer::class);
    }
}
