<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->boolean('brand')->default(false);
            $table->boolean('category')->default(false);
            $table->boolean('product')->default(false);
            $table->boolean('add_user')->default(false);
            $table->boolean('user_approve')->default(false);
            $table->boolean('designation')->default(false);
            $table->boolean('client_prof')->default(false);
            $table->boolean('client_users')->default(false);
            $table->boolean('view_po')->default(false);
            $table->boolean('change_po_status')->default(false);
            $table->integer('created_user_id');
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
        Schema::dropIfExists('privileges');
    }
}
