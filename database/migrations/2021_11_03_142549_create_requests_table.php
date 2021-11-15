<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{

    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_no',10);
            $table->foreignId('district_id')->constrained();
            $table->foreignId('request_type_id')->constrained();
            $table->string('whouse_from',10);
            $table->string('whouse_to',10);
            $table->string('material_part_no', 25);
            $table->double('quantity_req');
            $table->double('quantity_issued');
            $table->foreignId('request_status_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
