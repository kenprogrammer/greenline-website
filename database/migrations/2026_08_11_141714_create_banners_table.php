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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->uuid('banner_id')->unique();
            $table->string('title',30)->nullable();
            $table->string('description',50)->nullable();
            $table->string('assoc_image')->comment="Image associated with the banner";
            $table->enum('links_to', ['none','article', 'news_event', 'external_url']);
            $table->string('linked_article_slug')->nullable();
            $table->string('linked_url')->nullable();
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
