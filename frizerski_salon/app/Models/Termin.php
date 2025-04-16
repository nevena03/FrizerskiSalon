<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Termin extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'datum',
        'vreme',
        'status',
        'frizer_id',
        'klijent_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum' => 'date',
        'vreme' => 'datetime:H:i:s'
    ];

    public function frizer()
    {
        return $this->belongsTo(User::class, 'frizer_id');
    }

    public function klijent()
    {
        return $this->belongsTo(User::class, 'klijent_id');
    }

    public function racuns()
    {
        return $this->hasMany(Racun::class);
    }

    public function obavestenjas()
    {
        return $this->hasMany(Obavestenja::class)->latest('datum');
    }

    public function uslugas()
    {
        return $this->belongsToMany(Usluga::class);
    }
}
