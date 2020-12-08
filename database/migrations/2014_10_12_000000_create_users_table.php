<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('lastname');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
 
            $table->date('birthday')->nullable();
            $table->string('picture')->nullable();
            $table->string('portrait')->nullable();
            $table->enum('gender',['male','female'])->nullable();            
            $table->string('profession')->nullable();
            $table->text('biography')->nullable();
            $table->string('branch')->nullable();
            $table->string('aware_of_df')->nullable();
            $table->string('work_status')->default('working');
            $table->string('unemployement_proof')->nullable();
            $table->date('unemployement_expiry_date')->nullable();
            $table->decimal('price_hour')->nullable();

            $table->string('mobile')->nullable();            
            $table->string('phone')->nullable();            
            $table->timestamp('mobile_verified_at')->nullable();           
            $table->timestamp('phone_verified_at')->nullable();                   
            
            $table->string('address')->nullable();
            $table->string('address_info')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();

            $table->string('facebook')->nullable()->unique();
            $table->string('linkedin')->nullable()->unique();
            $table->string('instagram')->nullable()->unique();
            $table->string('youtube')->nullable()->unique();
            $table->string('tiktok')->nullable()->unique();
            $table->string('twitter')->nullable()->unique();
            $table->string('skype')->nullable()->unique();
            $table->string('snapchat')->nullable()->unique();
            $table->string('pinterest')->nullable()->unique();


            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
