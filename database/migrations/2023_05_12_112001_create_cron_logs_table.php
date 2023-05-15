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
        Schema::create('cron_logs', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->text('log');
            $table->enum('is_error', ['no', 'yes'])->default('yes');
            $table->unsignedBigInteger('rssh_connection_id');
            $table->timestamps();

            $table->foreign('rssh_connection_id')->references('id')->on('rssh_connections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cron_logs');
    }
};
