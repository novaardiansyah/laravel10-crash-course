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
    Schema::create('idea_like', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->CascadeOnDelete();
      $table->foreignId('idea_id')->constrained()->CascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('idea_like');
  }
};
