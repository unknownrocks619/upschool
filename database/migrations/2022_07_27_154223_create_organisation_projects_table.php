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
        Schema::create('organisation_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("organisations_id")->constrained("organisations", "id")->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText("description")->nullable();
            $table->text("genre")->nullable();
            $table->string("social")->nullable();
            $table->longText("images")->nullable();
            $table->longText("videos")->nullable();
            $table->boolean("dontaion")->default(false)->nullable();
            $table->longText("donations")->nullable();
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
        Schema::dropIfExists('organisation_projects');
    }
};
