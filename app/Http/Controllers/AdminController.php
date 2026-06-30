<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Istaknuto;
use App\Models\Katalog;
use App\Models\Komentar;
use App\Models\Porudzbina;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminPanel() {
        $porudzbineBroj = Porudzbina::count();
        $userBroj = User::count();
        $svePorudzbine = Porudzbina::with('katalog')->get();

        $ukupnaZarada = 0;

        foreach ($svePorudzbine as $porudzbina) {
                $ukupnaZarada += $porudzbina->katalog->cena;
        }
        $obicniKorisniciBroj = User::where("role","user")->count();
        $AdminiBroj = User::where("role","admin")->count();
        $EditorBroj = User::where("role","editor")->count();
        $porudzbine = Porudzbina::all();
        return view("adminPanel",compact("porudzbineBroj","userBroj","ukupnaZarada","obicniKorisniciBroj","AdminiBroj","EditorBroj","porudzbine"));
    }

    public function obrisiPorudzbinu($id) {
        $porudzbina = Porudzbina::findOrFail($id);
        $porudzbina->delete();
        return redirect()->route("preusmeravanje")->with("success","Uspesno ste obrisali porudzbinu!");
    }

    public function edit($id) {
        $porudzbina = Porudzbina::findOrFail($id);
        $sviProizvodi = Katalog::all();
        $sviUseri = User::all();
        return view("updatePorudzbina",compact("porudzbina","sviProizvodi","sviUseri"));
    }

    public function editStore($id,Request $request) {

        $request->validate([
            "ime" => "required|min:2",
            "email" => "required|email",
            "katalog_id" => "required|exists:katalogs,id",
            "user_id" => "required|exists:users,id",
        ]);

        $porudzbina = Porudzbina::findOrFail($id);
        $porudzbina->ime = $request->ime;
        $porudzbina->email = $request->email;
        $porudzbina->katalog_id = $request->katalog_id;
        $porudzbina->user_id = $request->user_id;
        $porudzbina->save();

        return redirect()->route("preusmeravanje")->with("success","Uspesno ste izmenili porudzbinu!");
    }

    public function listaProizvoda() {
        $proizvodi = Katalog::all();
        return view("adminListaProizvoda",compact("proizvodi"));
    }

    public function obrisiProizvod($id) {
        $proizvod = Katalog::findOrFail($id);
        Komentar::where("katalog_id", $proizvod->id)->delete();
        Porudzbina::where("katalog_id", $proizvod->id)->delete();
        $proizvod->delete();
        return redirect()->route("listaProizvoda")->with("success","Uspesno ste obrisali proizvod iz Kataloga!");
    }

     public function createProizvod() {
        $kategorije = Istaknuto::all();
        return view("dodaj_proizvod",compact('kategorije'));
    }

    public function storeProizvod(Request $request) {
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

        return redirect()->route("listaProizvoda")->with("success","Uspesno ste dodali novi proizvod!");
    }

    public function editProizvod($id) {
        $kategorije = Istaknuto::all();
        $proizvod = Katalog::findOrFail($id);
        return view("edituj_proizvod",compact("proizvod","kategorije"));
    }

    public function editStoreProizvod($id,Request $request) {
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

        return redirect()->route("listaProizvoda")->with("success","Uspesno ste izmenili proizvod!");
    }

    public function sviUseri() {
        $useri = User::all();
        return view("sviUseri",compact("useri"));
    }

    public function dodajUsera() {
        $rolovi = User::distinct()->pluck("role");
        return view("dodajUsera",compact("rolovi"));
    }

    public function storeUsera(Request $request) {
        $request->validate([
            "name" => "required|min:2",
            "email" => "required|email|unique:users",
            "role" => "required|in:user,admin,editor",
            "password" => "required|min:2",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("sviUseri")->with("success","Uspesno ste dodali novog usera!");
    }

    public function obrisiUsera($id) {
        $user = User::findOrFail($id);
        Komentar::where("user_id", $user->id)->delete();
        Porudzbina::where("user_id", $user->id)->delete();
        $user->delete();
        return redirect()->route("sviUseri")->with("success","Uspesno ste obrisali usera!");
    }

    public function editUsera($id) {
        $user = User::findOrFail($id);
        $rolovi = User::distinct()->pluck("role");
        return view("editUser",compact("user","rolovi"));
    }

    public function editStoreUsera($id,Request $request) {
        $request->validate([
            "name" => "required|min:2",
            "email" => "required|email",
            "role" => "required|in:user,admin,editor",
            "password" => "required|min:2",
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("sviUseri")->with("success","Uspesno ste izmenili Usera!");
    }
}
