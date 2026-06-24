<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Istaknuto extends Model
{
    protected $fillable = ["naziv"];

    public function katalog() {
        return $this->hasMany(Katalog::class);
    }
}
