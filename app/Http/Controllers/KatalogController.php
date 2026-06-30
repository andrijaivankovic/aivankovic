<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use App\Models\Komentar;
use App\Models\Porudzbina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
        $porudzbina->katalog_id = $id;

        if(auth()->user()) {
            $porudzbina->ime = auth()->user()->name;
            $porudzbina->email = auth()->user()->email;
            $porudzbina->user_id = auth()->user()->id;
        } else {
            $cookie_id = request()->cookie("korpa_id");
            if(!$cookie_id) {
                $cookie_id = uniqid();
                Cookie::queue("korpa_id",$cookie_id,43200);
            }
            $porudzbina->ime = "Gost";
            $porudzbina->email = "Gost";
            $porudzbina->cookie_id = $cookie_id;
        }

        $porudzbina->save();

        $korpa = session("korpa",[]);
        if(($key = array_search($id,$korpa)) !== false) {
            unset($korpa[$key]);
        }
        session(["korpa" => $korpa]);

        return redirect()->route("korpa")->with("success","Uspesno ste napravili porudzbinu!");
    }
}
