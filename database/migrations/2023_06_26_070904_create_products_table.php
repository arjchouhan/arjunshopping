<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_name');
            $table->string('title');
            $table->string('sort_description');
            $table->string('description');  
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('MRP', 8, 2)->default(0);
            $table->decimal('our_price', 8, 2)->default(0); 
           
            $table->timestamps();
            $table->string('prod_image')->nullable();
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
}
