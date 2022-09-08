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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->string("sku")->unique()->comment("Auto Generate");
            $table->integer("author_id")->index()->nullable();
            $table->integer("project_id")->index()->nullable();
            $table->string("slug");
            $table->longText("short_description");
            $table->longText("full_description");
            $table->string("type")->default("Digital")->comment("Options: digital, physical, service, all, digital_physical");
            $table->string("price")->nullable();
            $table->string("tax")->nullable();
            $table->string('total_price')->nullable();
            $table->longText("shipping")->nullable();
            $table->longText("images")->nullable();
            $table->longText("featurd_image")->nullable();
            $table->longText("meta")->nullable();
            $table->longText("status")->default("active")->comment("available options: active, pending, inactive, blocked");
            $table->longText('stock')->nullable()->comment("");
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
        Schema::dropIfExists('products');
    }
};
