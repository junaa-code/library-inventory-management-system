<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('book_id')->constrained()->onDelete('cascade');
        $table->foreignId('borrower_id')->constrained()->onDelete('cascade');
        $table->date('borrowed_at')->nullable();
        $table->date('due_at')->nullable();
        $table->date('returned_at')->nullable();
        $table->enum('status', ['borrowed','returned'])->default('borrowed');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

};
