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
        Schema::create('account_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('program_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('duration');
            $table->double('cost');
            $table->string('status');

            $table->foreign('account_id')->on('account')->references('id');
            $table->foreign('program_id')->on('program')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_programs');
    }
};
