<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dances', function (Blueprint $table) {
            $table->id();
            $table->text('dance');
            $table->text('choreo');
            $table->text('contrib');
            $table->integer('rosefav');
            $table->longText('stepsheet');
            $table->longText('vid1');
            $table->longText('vid2');
            $table->longText('vid3');
            $table->longText('hlink');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dances');
    }
}
