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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // Column for the blog title
            $table->text('description');       // Column for the blog description
            $table->string('image_url')->nullable(); // Column for the image URL, nullable if not all blogs will have images
            $table->string('author');          // Column for the author's name
            $table->dateTime('post_date');     // Column for the date of posting
            $table->string('slug')->unique();  // Column for a unique slug, used for SEO-friendly URLs
            $table->timestamps();              // Laravel's default timestamp columns for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
