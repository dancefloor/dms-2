<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('subtotal')->nullable();
            $table->decimal('vat')->nullable();
            $table->decimal('discount')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('coupon_discount')->nullable();
            $table->decimal('reduction')->nullable();
            $table->decimal('adjustment')->nullable();
            $table->decimal('total', 24,2)->nullable();
            $table->decimal('received')->nullable();
            $table->text('comments')->nullable();
            $table->text('comments_admin')->nullable();
            $table->string('status')->nullable(); //["open","canceled","paid","expired","partial","overpaid", "refunded"]
            $table->string('method')->nullable(); 
            $table->foreignId('author_id')->nullable()->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
}
