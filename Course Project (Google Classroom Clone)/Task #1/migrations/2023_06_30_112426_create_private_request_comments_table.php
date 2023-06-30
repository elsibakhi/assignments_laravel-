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
        Schema::create('private_request_comments', function (Blueprint $table) {
            $table->id();
            $table->foreign("student_id")->references("id")->on("students");
            $table->foreign("request_id")->references("id")->on("requests");
            $table->longText("comment");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_request_comments');
    }
};
