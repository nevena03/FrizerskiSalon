<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obavestenja extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['poruka', 'datum', 'termin_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum' => 'datetime',
    ];

    public function termin()
    {
        return $this->belongsTo(Termin::class);
    }
}
