<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {

            $table->id();

            $table->string('name')->index();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->float('lat', 9, 6);
            $table->float('lon', 9, 6);
            $table->string('phonenumber');
            $table->string('email');
            $table->string('siret');
            $table->mediumText('description');
            $table->boolean('delivery');
            $table->text('delivery_conditions')->nullable();
            $table->enum('state', ['1', '2' ,'3']);
            $table->string('comments_code');
            $table->string('website')->nullable();
            $table->text('opening_hours')->nullable();

            $table->foreignId('city_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('manager_id')->constrained('users');

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
        Schema::dropIfExists('stores');
    }
}
