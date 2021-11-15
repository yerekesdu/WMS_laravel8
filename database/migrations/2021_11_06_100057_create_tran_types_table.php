<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranTypesTable extends Migration
{

    public function up()
    {
        Schema::create('tran_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->string('description', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tran_types');
    }
}
