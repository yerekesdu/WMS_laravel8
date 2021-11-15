<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhousesTable extends Migration
{

    public function up()
    {
        Schema::create('whouses', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->string('name',50);
            $table->foreignId('district_id')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('whouses');
        $table->dropForeign('whouses_district_id_foreign');
        $table->dropForeign('whouses_district_id_foreign');
    }
}
