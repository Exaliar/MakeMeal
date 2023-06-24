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
        Schema::create('igredient_a_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->tinyText('serch')->unique();
            $table->text('json_response_api');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igredient_a_p_i_s');
    }
};
