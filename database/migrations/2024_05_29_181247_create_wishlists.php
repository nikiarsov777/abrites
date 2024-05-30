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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('language', 25);
            $table->string('platform', 25);
            $table->string('latest_release_number', 25)->nullable();
            $table->text('latest_download_url')->nullable();
            $table->timestamp('latest_release_published_at')->nullable();
            $table->smallInteger('rank');
            $table->smallInteger('stars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
