<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('whouse_id')->constrained();
            $table->foreignId('material_id')->constrained();
            $table->double('soh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
