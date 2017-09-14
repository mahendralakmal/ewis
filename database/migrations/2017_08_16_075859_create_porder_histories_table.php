<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorderHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porder_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('po_id');
            $table->dateTime('po_datetime');
            $table->integer('created_user_id')->nullable();
            $table->text('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('porder_histories');
    }
}
