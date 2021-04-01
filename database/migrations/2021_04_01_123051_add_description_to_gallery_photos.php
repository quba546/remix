<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToGalleryPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            $table->renameColumn('filename', 'path');
            $table->string('description', 1000)->nullable();
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
        Schema::table('gallery_photos', function (Blueprint $table) {
            $table->renameColumn('path', 'filename');
            $table->dropColumn('description');
            $table->dropSoftDeletes();
        });
    }
}
