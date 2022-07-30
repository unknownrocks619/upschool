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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string("alias_title")->nullable();
            $table->string('slug')->unique();
            $table->longText("images")->nullable();
            $table->longText("videos")->nullable();
            $table->longText("short_description")->nullable();
            $table->longText("full_description")->nullable();
            $table->boolean('under_development')->default(false);
            $table->longText('banner_text')->nullable();
            $table->longText("pre_requirement")->nullable();
            $table->string('course_access')->default('{"category":"free"}')->comment("Available Options: premium,paid,Free, Role[2,3,4,6],University[id].Role plus univerisy");
            $table->string('fee')->nullable();
            $table->boolean("discount")->default(false);
            $table->boolean("draft")->default(true);
            $table->boolean('active')->default(false);
            $table->string('active_from')->nullable();
            $table->string('active_till')->nullable();
            $table->string("course_level")->nullable();
            $table->string("created_by")->nullable();
            $table->string('updated_by')->nullable();
            $table->string("deleted_by")->nullable();
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
        Schema::dropIfExists('courses');
    }
};
