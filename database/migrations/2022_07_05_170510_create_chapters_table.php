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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->longText('courses_id')->nullable();
            $table->string('chapter_name');
            $table->string("alias")->nullable();
            $table->string('slug');
            $table->longText('chapter_description')->nullable();
            $table->string('chapter_type')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean("display")->default(true);
            $table->integer("display_order")->nullable();
            $table->longText("chapter_resources")->nullable();
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
        Schema::dropIfExists('chapters');
    }
};
