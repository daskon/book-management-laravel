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
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reader_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained();
            $table->timestamp('issue_date');
            $table->timestamp('return_date')->nullable();
            $table->string('issue_status')->nullable();
            $table->timestamp('return_day')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_issues');
    }
};
