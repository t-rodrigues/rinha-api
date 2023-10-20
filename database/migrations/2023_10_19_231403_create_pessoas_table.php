<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('apelido', 32)->unique();
            $table->string('nome', 100);
            $table->date('nascimento');
            $table->json('stack')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
