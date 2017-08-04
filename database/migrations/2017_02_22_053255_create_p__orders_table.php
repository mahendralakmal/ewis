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
            $table->integer('clients_branch_id');
            $table->text('bucket');
            $table->text('del_cp');
            $table->text('del_branch');
            $table->text('del_tp');
            $table->text('file')->nullable(true);
            $table->text('del_notes')->nullable(true);
            $table->text('del_address')->nullable(true);
            $table->text('cp_notes')->nullable(true);
            $table->integer('agent_id');
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
        Schema::dropIfExists('p__orders');
    }
}
