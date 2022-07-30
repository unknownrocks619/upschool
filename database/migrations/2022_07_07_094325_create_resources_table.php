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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('source')->comment("Lession, Course, Chapter etc.");
            $table->string("source_id")->comment("foreign key to source");
            $table->string('location')->default('top')->comment("location to appear for this resource. Top: Above Actual Content(Video), Below Actual Content (Video), After Widget ,[top,bottom,bottom_widget]");
            $table->string("type")->default('text')->comment('available optioins: file[url, file],image,video');
            $table->longText("downloadable_content")->nullable();
            $table->longText("links")->nullable();
            $table->longText("image")->nullable();
            $table->longText('video')->nullable();
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
        Schema::dropIfExists('resources');
    }
};
