<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $fillable = ["ime","opis","cena","na_stanju","istaknuto_id"];

    public function istaknuto() {
        return $this->belongsTo(Istaknuto::class);
    }

    public function proizvod() {
        return $this->hasMany(Porudzbina::class);
    }

    public function komentar() {
        return $this->hasMany(Komentar::class);
    }
}
