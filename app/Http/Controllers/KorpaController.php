<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use Illuminate\Http\Request;

class KorpaController extends Controller
{
    public function korpa() {
        $korpa = session("korpa",[]);
        $proizvodi = Katalog::whereIn("id",$korpa)->get();
        return view("korpa",compact("proizvodi"));
    }

    public function dodaj($id) {
        $korpa = session("korpa",[]);
        $korpa[] = $id;
        session(["korpa" => $korpa]);
        return redirect()->route("korpa")->with("success","Uspesno ste dodali proizvod u korpu!");
    }

    public function izbaci($id) {
        $korpa = session("korpa",[]);
        if(($key = array_search($id,$korpa)) !== false) {
            unset($korpa[$key]);
        }
        session(["korpa" => $korpa]);
        return redirect()->route("korpa")->with("success","Uspesno ste izbacili proizvod iz korpe!");
    }
}
