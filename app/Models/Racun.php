<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Racun extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'ukupna_cena',
        'nacin_placanja',
        'datum_izdavanja',
        'termin_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum_izdavanja' => 'date',
    ];

    public function termin()
    {
        return $this->belongsTo(Termin::class);
    }

    public function uslugas()
    {
        return $this->belongsToMany(Usluga::class, 'stavka_racuna')->withPivot('cena');
    }
}
