<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropoffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('transaction_id')->unsigned();
            $table->integer('service_category_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('amount');
            $table->text('note');

            $table->foreign('service_category_id')->references('id')
            ->on('service_categories')->onDelete('cascade');

            $table->foreign('item_id')->references('id')
            ->on('items')->onDelete('cascade');

            $table->foreign('transaction_id')->references('id')
            ->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dropoffs');
    }
}
