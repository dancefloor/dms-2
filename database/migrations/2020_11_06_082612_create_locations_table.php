<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('shortname')->nullable();
            $table->string('address')->nullable();
            $table->string('address_info')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('comments')->nullable();
            $table->string('contact')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('contract')->nullable();
            $table->text('video')->nullable();
            $table->string('entry_code')->nullable();
            $table->string('google_maps_shortlink')->nullable();
            $table->text('google_maps')->nullable();
            $table->text('public_transportation')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('locations');
    }
}
