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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string("middle_name")->nullable();
            $table->string("last_name");
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("local_address")->nullable();
            $table->string("date_of_birth")->nullable();
            $table->string("gender")->nullable();
            $table->string("phone_number")->nullable()->index();
            $table->string("source")->default("signup")->comment("Available Options: Sing up, Import, Campagain, Pre-Registration, Social Login");
            $table->string("source_id")->nullable();
            $table->string("username")->nullable()->index();
            $table->foreignId("role")->constrained("roles", "id");
            $table->string("status")->default('hold')->comment("Available Options: Hold: for unverified account, suspend: To disable user login for shorten period of time, review: Account waiting for review by authorized party, reject: Reject this account");
            $table->string('email')->nullable()->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
