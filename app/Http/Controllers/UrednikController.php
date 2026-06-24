<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Istaknuto;
use App\Models\Katalog;
use Illuminate\Http\Request;

class UrednikController extends Controller
{
    public function adminUrednikPanel() {
        $proizvodi = Katalog::all();
        return view("adminUrednikPanel",compact("proizvodi"));
    }

    public function create() {
        $kategorije = Istaknuto::all();
        return view("dodaj_proizvod",compact("kategorije"));
    }

    public function store(Request $request) {
        $request->validate([
            "ime" => "required|min:2",
            "opis" => "required|min:10",
            "cena" => "required|numeric|min:0",
            "slug" => "required|min:2|max:35",
            "na_stanju" => "required|boolean",
            "istaknuto_id" => "required|exists:istaknutos,id"
        ]);

        $proizvod = new Katalog();
        $proizvod->ime = $request->ime;
        $proizvod->opis = $request->opis;
        $proizvod->cena = $request->cena;
        $proizvod->slug = $request->slug;
        $proizvod->na_stanju = $request->na_stanju;
        $proizvod->istaknuto_id = $request->istaknuto_id;
        $proizvod->save();

        if ($request->hasFile("slika")) {
            $slika = $request->file("slika");

            $imeFajla = $proizvod->slug . ".jpg";
            
            $slika->move(public_path("img"),$imeFajla); 

        }

        return redirect()->route("preusmeravanje")->with("success","Uspesno ste dodali novi proizvod!");
    }

    public function edit($id) {
        $kategorije = Istaknuto::all();
        $proizvod = Katalog::findOrFail($id);
        return view("edituj_proizvod",compact("proizvod","kategorije"));
    }

    public function editStore($id,Request $request) {
        $request->validate([
            "ime" => "required|min:2",
            "opis" => "required|min:10",
            "cena" => "required|numeric|min:0",
            "slug" => "required|min:2|max:35",
            "na_stanju" => "required|boolean",
            "istaknuto_id" => "required|exists:istaknutos,id"
        ]);

        $proizvod = Katalog::findOrFail($id);
        $proizvod->ime = $request->ime;
        $proizvod->opis = $request->opis;
        $proizvod->cena = $request->cena;
        $proizvod->slug = $request->slug;
        $proizvod->na_stanju = $request->na_stanju;
        $proizvod->istaknuto_id = $request->istaknuto_id;
        $proizvod->update();

        return redirect()->route("preusmeravanje")->with("success","Uspesno ste izmenili proizvod!");
    }
}
