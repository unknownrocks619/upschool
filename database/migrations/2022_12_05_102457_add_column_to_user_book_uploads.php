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
        Schema::table('user_book_uploads', function (Blueprint $table) {
            //
            $table->string('parent_email')->nullable()->after('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_book_uploads', function (Blueprint $table) {
            //
            $table->dropColumn('parent_email');
        });
    }
};
