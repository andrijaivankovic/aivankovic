<?php

namespace Database\Seeders;

use App\Models\Katalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Katalog::create([
           "ime" => "Egzotik Mango-Vanilla Monoporcija",
           "opis" => "Moderna monoporcija prekrivena sjajnom ogledalo glazurom od tropskog manga. Unutrašnjost krije baršunasti mus od burbon vanile i voćno srce koje pruža nezaboravan, balansiran ukus pri svakom zalogaju.",
           "cena" => 520.00,
           "slug" => "egzotik-mango",
           "na_stanju" => true,
           "istaknuto_id" => 3
        ]);

        Katalog::create([
           "ime" => "Premium Noisette-Choco sa lešnikom",
           "opis" => "Remek-delo za čokoladne čistunce. Bogati mus od tamne belgijske čokolade spojen je sa hrskavom pastom od lešnika na finom biskvitu, posut kvalitetnim kakaom i ukrašen elegantnom čokoladnom bombicom.",
           "cena" => 480.00,
           "slug" => "noisette-choco",
           "na_stanju" => true,
           "istaknuto_id" => 3
        ]);

        Katalog::create([
           "ime" => "Forest Berry Mille-Feuille",
           "opis" => "Hiljadu listića hrskavog domaćeg lisnatog testa u kombinaciji sa laganim poslastičarskim kremom od vanile. Ovaj prefinjeni desert obogaćen je svežim borovnicama i malinama i posut finim prah šećerom.",
           "cena" => 550.00,
           "slug" => "forest-berry",
           "na_stanju" => true,
           "istaknuto_id" => 3
        ]);

        

        Katalog::create([
           "ime" => "Smaragdna Elegancija",
           "opis" => "„Smaragdna Elegancija“ je kulinarsko remek-delo stvoreno za glamurozne proslave, luksuzna venčanja i jubileje. Torta se sastoji od četiri sprata koji prikazuju savršen gradijent - od tamnozelene teksturne osnove koja podseća na prirodne elemente, do nežnih maslinastih tonova na vrhu. Centralni motiv je masivan, ručno izrađen beli cvet od šećerne paste, dok prozirni svetleći prsten između spratova unosi dozu moderne magije i dramatičnosti. Izaberite kombinaciju naših premium ukusa za svaki sprat i fascinirajte svoje goste.", 
           "cena" => 9999.99,
           "slug" => "smaragdna-elegancija",
           "na_stanju" => true,
           "istaknuto_id" => 5
        ]);

        

        
        Katalog::create([
           "ime" => "Pistać i bela čokolada luksuzni kolač",
           "opis" => "Namenjen istinskim ljubiteljima pistaća. Ovaj premium kolač sadrži bogat mus od belog zlata - sicilijanskog pistaća, sa tečnim srcem od bele čokolade, postavljen na hrskavoj bazi.",
           "cena" => 490.00,
           "slug" => "pistac",
           "na_stanju" => true,
           "istaknuto_id" => 1
        ]);

        

        

        
    }
}
