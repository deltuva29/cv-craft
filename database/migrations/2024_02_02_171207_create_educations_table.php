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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('profile_id')->nullable()->index()->constrained()->cascadeOnDelete();
            $table->foreignId('graduation_id')->nullable()->index()->constrained()->cascadeOnDelete();
            $table->year('ended_year')->nullable();
            $table->string('specialty')->nullable();
            $table->string('institution')->nullable();
            $table->text('achievements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
