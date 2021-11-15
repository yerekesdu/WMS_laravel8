<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestStatusesTable extends Migration
{

    public function up()
    {
        Schema::create('request_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('code', 25);
            $table->string('description', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_statuses');
    }
}
