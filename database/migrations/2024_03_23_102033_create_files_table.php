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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('is_profile')->default(false);
            $table->foreignId('reply_id')->nullable();
            $table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('fileable_id');
            $table->string('fileable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
