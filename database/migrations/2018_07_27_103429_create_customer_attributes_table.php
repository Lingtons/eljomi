<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->integer('option_value_id')->unsigned();

            $table->foreign('customer_id')->references('id')
            ->on('customers')->onDelete('cascade');

            $table->foreign('option_id')->references('id')
            ->on('options')->onDelete('cascade');            

            $table->foreign('option_value_id')->references('id')
            ->on('option_values')->onDelete('cascade');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_attributes');
    }
}
