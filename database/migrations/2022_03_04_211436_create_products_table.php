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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('sku', 50)->unique();
            $table->string('name', 200)->unique();
            $table->text('description')->nullable();
            $table->string('path_image', 255)->nullable();
            $table->unsignedDecimal('price', 10,2);
            $table->boolean('iva');
            $table->boolean('is_active');
            $table->unsignedInteger('stock');
            $table->index(['is_active']);
            $table->primary(['id']);
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
        Schema::dropIfExists('products');
    }
};
