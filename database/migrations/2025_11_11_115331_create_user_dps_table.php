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
        Schema::create('user_dps', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('dps_name');
            $table->integer('installment_interval');
            $table->integer('total_installment');
            $table->integer('per_installment');
            $table->integer('interest_rate');
            $table->integer('given_installment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dps');
    }
};
