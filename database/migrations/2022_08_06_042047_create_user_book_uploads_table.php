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
            $table->integer("project_id")->index()->nullable()->comment("implement to determine the project to be donated.");
            $table->string("book_title")->nullable();
            $table->longText("short_description")->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('canva_link')->nullable();
            $table->longText("images")->nullable();
            $table->string('school')->nullable();
            $table->longText('categories')->nullable();
            $table->string("status")->default("draft")->comment("available options: active, inactive, rejected, pending,drafts");
            $table->string("book")->nullable();
            $table->string("updated_by")->nullable();
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
