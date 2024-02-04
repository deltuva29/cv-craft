<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->text('description')->nullable();
            $table->boolean('current')->default(false);
            $table->foreignId('profile_id')->nullable()->index()->constrained()->cascadeOnDelete();
            $table->foreignId('job_title_id')->nullable()->index()->constrained()->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()->index()->constrained()->cascadeOnDelete();
            $table->date('started_at');
            $table->date('ended_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
