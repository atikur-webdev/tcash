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
        Schema::create('dps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('installment_interval');
            $table->integer('total_installment');
            $table->integer('per_installment');
            $table->integer('interest_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dps');
    }
};
