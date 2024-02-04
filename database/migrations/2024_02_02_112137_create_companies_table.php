<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('logo')->nullable();
            $table->longText('description')->nullable();
            $table->string('founded')->nullable();
            $table->string('size')->nullable();
            $table->string('revenue')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('type')->nullable();
            $table->string('specialties')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
