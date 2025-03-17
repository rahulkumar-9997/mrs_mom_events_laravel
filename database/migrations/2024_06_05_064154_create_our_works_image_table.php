<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurWorksImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_works_image', function (Blueprint $table) {
            $table->id();
            $table->string('our_work_image');
            $table->unsignedBigInteger('our_work_id')->unsigned(); 
            $table->foreign('our_work_id')->references('id')->on('our_works');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_works_image');
    }
}
