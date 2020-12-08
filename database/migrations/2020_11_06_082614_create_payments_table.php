<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('provider')->nullable();
            $table->string('method')->nullable();
            $table->string('amount');
            $table->string('amount_received')->nullable();
            $table->string('currency')->nullable();
            $table->string('mollie_payment_id')->nullable();
            $table->enum('status', ["paid","partial","processing","overpaid","failed","open","canceled","expired"]);
            $table->date('received_date')->nullable();
            $table->text('comments')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_id');
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
