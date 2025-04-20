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
        Schema::create('help_posts', function (Blueprint $table) {
            $table->id();
            $table->string('user_name'); // имя пользователя, создавшего пост
            $table->string('heading'); // заголовок поста
            $table->boolean('importance')->default(false); // важность поста
            $table->text('txt'); // текст поста
            $table->foreignId('volunteer_id')->nullable()->constrained('volunteers'); // связь с волонтером
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_posts');
    }
};
