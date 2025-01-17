<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('description', 20);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['description', 'deleted_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
