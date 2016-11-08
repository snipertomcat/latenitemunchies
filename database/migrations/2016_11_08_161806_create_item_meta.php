<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('_qty');
            $table->integer('_product_id');
            $table->integer('_variation_id');
            $table->float('_line_subtotal');
            $table->float('_line_total');
            $table->float('_line_subtotal_tax', 8, 4);
            $table->float('_line_tax', 8, 4);
            $table->text('_line_tax_data');
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
        Schema::drop('item_meta');
    }
}
