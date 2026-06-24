<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function preusmeravanje() {
        if(auth()->user()->role == "admin") {
            return redirect()->route("adminPanel");
        }

        if(auth()->user()->role == "editor") {
            return redirect()->route("adminUrednikPanel");
        }
    }
}
