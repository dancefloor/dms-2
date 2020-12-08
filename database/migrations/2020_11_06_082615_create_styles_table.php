<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('styles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('origin')->nullable();
            $table->string('family')->nullable();
            $table->string('music')->nullable();
            $table->string('year')->nullable();
            $table->text('video')->nullable();
            $table->string('portrait')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('styles');
    }
}
