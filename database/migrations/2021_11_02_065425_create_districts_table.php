<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{

    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->string('name', 50);
            $table->foreignId('status_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('districts');
        $table->dropForeign('districts_status_id_foreign');
    }
}
