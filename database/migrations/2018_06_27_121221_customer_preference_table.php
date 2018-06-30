<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_preference', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->nullable();           
            $table->integer('preference_id')->unsigned()->nullable();
            $table->string('value');
            
            $table->foreign('preference_id')->references('id')
                  ->on('preferences')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')
                  ->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_preference');
    }
}
