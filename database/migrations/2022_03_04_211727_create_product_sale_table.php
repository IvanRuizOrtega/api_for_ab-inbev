<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->uuid('sale_id');
            $table->foreign('sale_id')->references('id')
                ->on('sales')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('amount', false);
            $table->unsignedDecimal('unit_value', 10,2);
            $table->boolean('iva');
            $table->unsignedDecimal('full_value', 10,2);
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
        Schema::dropIfExists('product_sale');
    }
};
