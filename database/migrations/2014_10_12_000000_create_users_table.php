<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('password');

            // For email confirmation
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token')->unique()->nullable();

            // for password reset
            $table->string('password_reset_token')->unique()->nullable();
            $table->timestamp('password_reset_sent_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
