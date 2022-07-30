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
        Schema::create('lessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("chapter_id")->nullable()->constrained("chapters");
            $table->string("lession_name");
            $table->string("slug");
            $table->string("intro_text")->nullable();
            $table->longText('lession_description')->nullable();
            $table->longText("remarks")->nullable();
            $table->longText('video')->nullable();
            $table->string("sort")->nullable();
            $table->string('video_duration')->nullable();
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
        Schema::dropIfExists('lessions');
    }
};
