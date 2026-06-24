<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = ["komentar","ocena","katalog_id","user_id"];

    public function katalog() {
        return $this->belongsTo(Katalog::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
