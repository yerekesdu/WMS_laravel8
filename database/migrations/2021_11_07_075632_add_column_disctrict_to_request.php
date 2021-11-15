<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDisctrictToRequest extends Migration
{

    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->integer('district_id_to');
        });
    }

    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            //
        });
    }
}
