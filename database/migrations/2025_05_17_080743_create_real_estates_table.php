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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->enum('real_state_type', ['house', 'department', 'land', 'commercial_ground']);
            $table->string('street', 128);
            $table->string('external_number', 12);
            $table->string('internal_number', 12)->nullable();
            $table->string('neighborhood', 128);
            $table->string('city', 64);
            $table->char('country', 2);
            $table->integer('rooms');
            $table->decimal('bathrooms', 3, 1);
            $table->string('comments', 128)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
