<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('houseTitle',100);
            $table->string('housePrice',100);
            $table->string('contractType',100);
            $table->float('houseArea');
            $table->integer('accepted')->default(0);
            $table->string('Location',100);
            $table->string('description',400);
            $table->integer('floorNbrs');
            $table->string('housePic');
            $table->foreignId('Owner_id')->references('id')->on('users');
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
        Schema::dropIfExists('houses');
    }
}
