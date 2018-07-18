<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('service_category_id')->unsigned();
            $table->integer('transaction_code')->unique();
            $table->dateTime('pickup_time');
            $table->dateTime('due_time');
            $table->dateTime('delivery_time')->nullable();            
            $table->text('collections');
            $table->string('short_note');
            $table->decimal('total');
            $table->decimal('paid')->nullable();
            $table->decimal('balance')->nullable();
            $table->boolean('delivered')->default(false);
            

            $table->foreign('customer_id')->references('id')
            ->on('customers')->onDelete('cascade');

            $table->foreign('service_category_id')->references('id')
            ->on('service_categories')->onDelete('cascade');

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
        Schema::dropIfExists('transactions');
    }
}
