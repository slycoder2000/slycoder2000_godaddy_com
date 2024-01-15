<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('incidents', function (Blueprint $table) {
            $table->time('time')->nullable()->change();
            $table->time('duration')->nullable()->change();
            $table->longText('notes')->nullable()->change();
            $table->longText('hlink')->nullable()->change();
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
