<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 40)->unique();
            $table->string('publisher', 40);
            $table->string('price');
            $table->integer('edition');
            $table->string('publication_year', 4);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['title', 'deleted_at']);
            $table->index(['publisher', 'deleted_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
