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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('membership_id');
            $table->double('total_cost');
            $table->string('duration');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('free_session');
            $table->string('status');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
