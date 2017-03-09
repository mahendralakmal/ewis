<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('part_no')->unique();
            $table->string('name',45);
            $table->string('description');
            $table->integer('category_id')->unsigned()->index();
            $table->text('image')->nullable();
            $table->decimal('default_price',11,2)->nullable(true);
            $table->boolean('status')->default(0);
            $table->boolean('vat_apply')->default(0);
            $table->float('vat')->nullable(true);
            $table->string('user_id')->default(null);
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
}
