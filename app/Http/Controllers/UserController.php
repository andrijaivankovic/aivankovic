<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Komentar;
use App\Models\Porudzbina;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function moje_narudzbine($id) {
        $narudzbine = Porudzbina::where("user_id",$id)
            ->get();
        return view("moje_narudzbine",compact("narudzbine"));
    }

    public function obrisi($id) {
        $narudzbina = Porudzbina::findOrFail($id);
        $narudzbina->delete();
        return redirect()->route("moje_narudzbine",[$id => auth()->user()->id])->with("success","Uspesno ste obrisali porudzbinu!");
    }
    
    public function komentar($id,Request $request) {

        $request->validate([
            "komentar" => "required",
            "ocena" => "required",
        ]);

        $komentar = new Komentar();
        $komentar->komentar = $request->komentar;
        $komentar->ocena = $request->ocena;
        $komentar->katalog_id = $id;
        $komentar->user_id = $request->user_id;
        $komentar->save();

        return redirect()->route("proizvod",$id)->with("success","Uspesno ste dodali komentar!");
    }

    public function obrisi_komentar($id) {
        $komentar = Komentar::findOrFail($id);
        $proizvod_id = $komentar->katalog_id;
        $komentar->delete();
        return redirect()->route("proizvod",$proizvod_id)->with("success","Uspesno ste obrisali komentar!");
    }

    public function update($id,$proizvodid) {
        $komentar = Komentar::findOrFail($id);
        $proizvod = Katalog::findOrFail($proizvodid);
        return view("update",compact("komentar","proizvod"));
    }

    public function updateStore($id,Request $request) {

        $request->validate([
            "komentar" => "required|max:100",
            "ocena" => "required|integer|min:1|max:5",
        ]);

        $komentar = Komentar::findOrFail($id);
        $komentar->komentar = $request->komentar;
        $komentar->ocena = $request->ocena;
        $komentar->update();
        $proizvod_id = $komentar->katalog_id;
        return redirect()->route("proizvod",$proizvod_id)->with("success","Uspesno ste izmenili svoj komentar!");
    }
}
