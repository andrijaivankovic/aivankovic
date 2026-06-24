<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Komentar;
use App\Models\Porudzbina;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function katalog() {
        $proizvodi = Katalog::all();
        return view("katalog",compact("proizvodi"));
    }

    public function proizvod($id) {
        $proizvod = Katalog::findOrFail($id);
        $komentari = Komentar::where("katalog_id",$id)->get();

        return view("proizvod",compact("proizvod","komentari"));
    }

    public function poruci($id) {
        $porudzbina = new Porudzbina();
        $porudzbina->ime = auth()->user()->name;
        $porudzbina->email = auth()->user()->email;
        $porudzbina->katalog_id = $id;
        $porudzbina->user_id = auth()->user()->id;
        $porudzbina->save();

        return redirect()->route("proizvod",$id)->with("success","Uspesno ste napravili porudzbinu!");
    }
}
