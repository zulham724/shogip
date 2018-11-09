<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmkmLegalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm_legality', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('umkm_id')->unsigned();
            $table->integer('legality_list_id')->unsigned();
            $table->timestamps();

            $table->foreign('umkm_id')->references('id')->on('umkm')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('legality_list_id')->references('id')->on('legality_list')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkm_legality');
    }
}
