<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->text('address');
            $table->text('contact_no');
            $table->text('email');
            $table->boolean('activation')->default(0);
            $table->integer('client_id')->unsigned()->index();
            $table->integer('agent_id')->unsigned()->index()->nullable(true);
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
        Schema::dropIfExists('clients_branches');
    }
}
