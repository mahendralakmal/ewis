<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAssignProductViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE VIEW client_assign_product_views AS 
               SELECT c.id, c.c_category_id, c.product_id, p.part_no, p.`name` 
                FROM client__products c
                LEFT JOIN c_brands cb ON (c.brand_id = cb.id)
                LEFT JOIN brands b ON (b.id = cb.brand_id)
                LEFT JOIN c_categories cc ON (c.c_category_id = cc.id)
                LEFT JOIN categories cg ON (cc.category_id = cg.id)
                LEFT JOIN products p ON (c.product_id = p.id)
                WHERE c.`remove` = 0 
        ');
//        Schema::create('client_assign_product_views', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_assign_product_views');
    }
}
