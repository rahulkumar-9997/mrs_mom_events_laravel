<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('intro_description')->after('slug')->nullable();
            $table->string('intro_image')->after('intro_description')->nullable();
            $table->boolean('is_external')->after('intro_image')->default(false);
            $table->string('external_url')->after('is_external')->nullable();
            $table->string('sort_order')->after('external_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
}
