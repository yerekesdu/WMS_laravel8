<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 10);
            $table->foreignId('district_id')->constrained();
            $table->string('material_part_no');
            $table->double('price', 10);
            $table->double('qty', 10);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_district_id_foreign');
            $table->dropForeign('orders_material_part_no_foreign');
            $table->dropForeign('orders_user_id_foreign');
        });
    }
}
