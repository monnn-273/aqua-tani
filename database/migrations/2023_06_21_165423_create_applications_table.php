<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId("job_id")->constrained("jobs");
            $table->foreignId("applicant_id")->constrained("users");
            $table->string("application_status")->enum(["processed", "accepted", "rejected"])->default('processed');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
