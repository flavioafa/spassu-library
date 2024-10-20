<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['name', 'deleted_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
