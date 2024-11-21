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
        Schema::create('xatlars', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('where');
            $table->string('section');
            $table->string('fio');
            $table->string('nushalar');
            $table->string('page');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xatlars');
    }
};
