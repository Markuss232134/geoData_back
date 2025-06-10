<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->decimal('area_km2', 10, 2); // 8 cipari pirms komata + 2 pēc
            $table->unsignedBigInteger('population');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('countries');
    }
};
