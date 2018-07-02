   <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_category_id')->unsigned();
            $table->integer('item_category_id')->unsigned();
            $table->string('name');
            $table->decimal('price')->unsigned();

            $table->foreign('service_category_id')->references('id')
            ->on('service_categories')->onDelete('cascade');

            $table->foreign('item_category_id')->references('id')
            ->on('item_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
