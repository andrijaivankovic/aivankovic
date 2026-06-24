<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PocetnaController;
use App\Http\Controllers\PrijavaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UrednikController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get("/", function () {
//     return view("welcome");
// });

Route::get("/dashboard", function () {
    return view("dashboard");
})->middleware(["auth", "verified"])->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});


require __DIR__."/auth.php";

Route::get("/",[PocetnaController::class,"pocetna"])->name("pocetna");
Route::get("/kontakt",[PocetnaController::class,"kontakt"])->name("kontakt");
Route::get("/katalog",[KatalogController::class,"katalog"])->name("katalog");
Route::get("proizvod/{id}",[KatalogController::class,"proizvod"])->name("proizvod");


Route::middleware(['auth'])->group(function () {
Route::get("poruci/{id}",[KatalogController::class,"poruci"])->name("poruci");

Route::get("moje_narudzbine/{id}",[UserController::class,"moje_narudzbine"])->name("moje_narudzbine");
Route::get("obrisi/{id}",[UserController::class,"obrisi"])->name("obrisi");

Route::post("/komentar/{id}",[UserController::class,"komentar"])->name("komentar");
Route::get("/obrisi_komentar/{id}",[UserController::class,"obrisi_komentar"])->name("obrisi_komentar");

Route::get("/update/{id}/{proizvodid}",[UserController::class,"update"])->name("update");
Route::post("/update/{id}",[UserController::class,"updateStore"])->name("updateStore");

Route::get("/preusmeravanje",[RedirectController::class,"preusmeravanje"])->name("preusmeravanje");

Route::prefix("admin")->group(function () {

    Route::middleware(['role:admin'])->group(function () {
    Route::get("Panel",[AdminController::class,"adminPanel"])->name("adminPanel");
    Route::get("/glavni/porudzbina/obrisi/{id}", [AdminController::class, "obrisiPorudzbinu"])->name("admin.obrisiPorudzbinu");
    Route::get("/glavni/porudzbina/edit/{id}", [AdminController::class, "edit"])->name("admin.editPorudzbina");
    Route::post("/glavni/porudzbina/edit/{id}", [AdminController::class, "editStore"])->name("admin.storePorudzbina");
    Route::get("/glavni/listaProizvoda",[AdminController::class,"listaProizvoda"])->name("listaProizvoda");
    Route::delete("/glavni/obrisi/proizvod/{id}",[AdminController::class,"obrisiProizvod"])->name("obrisiProizvod");
    Route::get("/glavni/proizvod/dodaj", [AdminController::class, "createProizvod"])->name("admin.proizvod.create");
    Route::post("/glavni/proizvod/dodaj", [AdminController::class, "storeProizvod"])->name("admin.proizvod.store");
    Route::get("/glavni/edituj/proizvod/{id}", [AdminController::class, "editProizvod"])->name("admin.edit.proizvod");
    Route::post("/glavni/edituj/proizvod/{id}", [AdminController::class, "editStoreProizvod"])->name("admin.editStore.proizvod");
    Route::get("/glavni/sviUseri",[AdminController::class,"sviUseri"])->name("sviUseri");
    Route::get("/glavni/dodajUsera",[AdminController::class,"dodajUsera"])->name("dodajUsera");
    Route::post("/glavni/dodajUsera",[AdminController::class,"storeUsera"])->name("storeUsera");
    Route::delete("glavni/obrisiUsera/{id}",[AdminController::class,"obrisiUsera"])->name("obrisiUsera");
    Route::get("/glavni/editUsera/{id}",[AdminController::class,"editUsera"])->name("editUsera");
    Route::post("/glavni/editUsera/{id}",[AdminController::class,"editStoreUsera"])->name("editStoreUsera");
    });

    Route::middleware(['role:editor'])->group(function () {
    Route::get("/UrednikPanel",[UrednikController::class,"adminUrednikPanel"])->name("adminUrednikPanel");
    Route::get("/urednik/proizvod/dodaj", [UrednikController::class, "create"])->name("urednik.proizvod.create");
    Route::post("/urednik/proizvod/dodaj", [UrednikController::class, "store"])->name("urednik.proizvod.store");
    Route::get("/urednik/edituj/proizvod/{id}", [UrednikController::class, "edit"])->name("urednik.edit.proizvod");
    Route::post("/urednik/edituj/proizvod/{id}", [UrednikController::class, "editStore"])->name("urednik.editStore.proizvod");
    });
});

});