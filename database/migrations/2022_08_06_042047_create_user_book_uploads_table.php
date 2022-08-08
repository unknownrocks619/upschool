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
        Schema::create('user_book_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users", "id");
            $table->longText("short_description")->nullable();
            $table->longText('full_description')->nullable();
            $table->longText("images")->nullable();
            $table->string('country')->nullable();
            $table->string("status")->default("pending")->comment("available options: active, inactive, rejected, pending");
            $table->string("book")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_book_uploads');
    }
};
