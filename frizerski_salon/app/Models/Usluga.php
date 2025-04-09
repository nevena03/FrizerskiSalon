<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usluga extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv', 'cena', 'administrator_id'];

    protected $searchableFields = ['*'];

    public function administrator()
    {
        return $this->belongsTo(User::class, 'administrator_id');
    }

    public function racuns()
    {
        return $this->belongsToMany(Racun::class, 'stavka_racuna');
    }

    public function termins()
    {
        return $this->belongsToMany(Termin::class);
    }
}
