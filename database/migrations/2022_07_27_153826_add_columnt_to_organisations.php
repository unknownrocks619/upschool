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
        Schema::table('organisations', function (Blueprint $table) {
            //
            $table->string("featured_image")->nullable()->nullable("Json fields containing attribute logo");
            $table->string("featured_videos")->nullable()->nullable("Json fields containing attribute logo");
            $table->string("logo")->nullable()->nullable("Json fields containing attribute logo");
            $table->string("images")->nullable()->nullable("Json fields containing attribute logo");
            $table->string("videos")->nullable()->nullable("Json fields containing attribute logo");
            $table->longText("short_description")->nullabe();
            $table->longText("description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisations', function (Blueprint $table) {
            //
        });
    }
};
