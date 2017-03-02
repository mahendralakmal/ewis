<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->boolean('brand')->default(false);
            $table->boolean('category')->default(false);
            $table->boolean('product')->default(false);
            $table->boolean('add-user')->default(false);
            $table->boolean('user-approve')->default(false);
            $table->boolean('designation')->default(false);
            $table->boolean('client-prof')->default(false);
            $table->boolean('client-users')->default(false);
            $table->boolean('view-po')->default(false);
            $table->boolean('change-po-status')->default(false);
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
        Schema::dropIfExists('user_permissions');
    }
}
