<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('katalogs', function (Blueprint $table) {
            $table->id();
            $table->string("ime");
            $table->text("opis");
            $table->decimal("cena");
            $table->string("slug");
            $table->boolean("na_stanju");
            $table->foreignId("istaknuto_id")->constrained("istaknutos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalogs');
    }
};
