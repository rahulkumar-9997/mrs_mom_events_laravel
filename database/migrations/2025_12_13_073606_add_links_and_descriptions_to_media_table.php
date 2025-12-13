<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinksAndDescriptionsToMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->string('media_image_link')->nullable()->after('youtube_link');
            $table->longText('media_link_description')->nullable()->after('media_image_link');
            $table->longText('youtube_link_description')->nullable()->after('media_link_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn([
                'media_image_link',
                'media_link_description',
                'youtube_link_description',
            ]);
        });
    }
}
