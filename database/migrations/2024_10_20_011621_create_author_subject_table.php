<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('author_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('author_book');
    }
};
