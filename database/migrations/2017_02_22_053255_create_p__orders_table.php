<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p__orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id');
            $table->text('bucket');
            $table->text('del_cp');
            $table->text('del_branch');
            $table->integer('del_tp');
            $table->text('del_notes');
            $table->text('cp_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p__orders');
    }
}
