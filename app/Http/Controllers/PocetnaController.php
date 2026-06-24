<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use Illuminate\Http\Request;

class PocetnaController extends Controller
{
    public function pocetna() {
        $premiumKolekcija = Katalog::where("istaknuto_id",3)->get();
        return view("pocetna",compact("premiumKolekcija"));
    }

    public function kontakt() {
        return view("kontakt");
    }
}
