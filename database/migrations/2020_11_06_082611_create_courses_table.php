<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 400);
            $table->string('slug', 400);
            
            $table->text('excerpt')->nullable();
            $table->longText('description')->nullable();
            $table->text('online_description')->nullable();
            $table->text('live_description')->nullable();
            $table->string('tagline')->nullable();
            $table->string('keywords')->nullable();
            
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            
            $table->boolean('monday')->nullable();
            $table->time('start_time_mon')->nullable();
            $table->time('end_time_mon')->nullable();
            

            $table->boolean('tuesday')->nullable();
            $table->time('start_time_tue')->nullable();
            $table->time('end_time_tue')->nullable();
            
            $table->boolean('wednesday')->nullable();
            $table->time('start_time_wed')->nullable();
            $table->time('end_time_wed')->nullable();
            
            $table->boolean('thursday')->nullable();
            $table->time('start_time_thu')->nullable();
            $table->time('end_time_thu')->nullable();
            
            $table->boolean('friday')->nullable();
            $table->time('start_time_fri')->nullable();
            $table->time('end_time_fri')->nullable();
            
            $table->boolean('saturday')->nullable();
            $table->time('start_time_sat')->nullable();
            $table->time('end_time_sat')->nullable();
            
            $table->boolean('sunday')->nullable();
            $table->time('start_time_sun')->nullable();
            $table->time('end_time_sun')->nullable();
            
            $table->string('level')->nullable();
            $table->string('level_number')->nullable();
            
            $table->time('duration')->nullable();            

            $table->text('teaser_video_1')->nullable();
            $table->text('teaser_video_2')->nullable();
            $table->text('teaser_video_3')->nullable();
            
            $table->decimal('full_price')->nullable();
            $table->decimal('reduced_price')->nullable();
            $table->decimal('promo_price')->nullable();
            $table->date('promo_price_expiry_date')->nullable();
            $table->decimal('live_price')->nullable();
            $table->decimal('online_price')->nullable();
            
            $table->string('thumbnail')->nullable();
            $table->string('image_landscape')->nullable();
            $table->string('image_square')->nullable();
            $table->string('image_portrait')->nullable();
            $table->string('focus')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_online')->nullable();
            $table->string('status')->nullable();
            $table->string('online_link')->nullable();
            $table->string('online_password')->nullable();
            $table->text('online_embed')->nullable();
            $table->boolean('standby')->nullable();
            
            $table->foreignId('user_id');
            $table->foreignId('classroom_id')->nullable();
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
        Schema::dropIfExists('courses');
    }
}