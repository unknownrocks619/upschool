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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("slug");
            $table->string('website')->nullable();
            $table->string("contact_number")->nullable();
            $table->string('contact_person')->nullable();
            $table->string("type")->default('organisation')->comment('school, organisations, intitute, freelancer');
            $table->longText("remarks")->nullable();
            $table->boolean("active")->default(false);
            $table->integer("total_student")->default(0);
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
        Schema::dropIfExists('organisations');
    }
};
