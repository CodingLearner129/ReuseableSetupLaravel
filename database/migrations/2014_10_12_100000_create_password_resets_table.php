<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            // $table->string('email')->primary();
            $table->string('token');
            $table->enum('user_type', ['admin', 'user']);
            $table->unsignedInteger('expired_at')->default(0);
            $table->unsignedInteger('reset_count')->default(0);
            $table->unsignedInteger('reset_request_at')->default(0);
            $table->unsignedInteger('created_at')->default(0);
            // $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
