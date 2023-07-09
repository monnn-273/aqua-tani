<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("skill_id")->constrained("skills");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_skills');
    }
};
