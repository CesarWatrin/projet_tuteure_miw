<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePictureStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_store', function (Blueprint $table) {
            $table->foreignId('picture_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->primary(['picture_id', 'store_id']);
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
        Schema::dropIfExists('picture_store');
    }
}
