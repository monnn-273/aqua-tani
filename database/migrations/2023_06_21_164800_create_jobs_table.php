<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("job_title");
            $table->text("job_description");
            $table->text("responsibilities");
            $table->text("experience");
            $table->text("benefits");
            $table->integer("vacancy");
            $table->string("salary");
            $table->string("location");
            $table->date("deadline");
            $table->enum("gender", ['laki-laki', 'perempuan', 'tidak ditentukan']);
            $table->enum("job_category", ['pertanian', 'perikanan']);
            $table->foreignId("job_owner_id")->constrained("users");
            $table->enum("job_status", ['open', 'closed']);
            $table->enum("job_type", ['full-time', 'part-time']);
            $table->string("image")->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
