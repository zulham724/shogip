<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmkmBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm_biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('umkm_id')->unsigned();
            $table->date('date_of_birth');
            $table->string('founder');
            $table->string('total_employes');
            $table->string('monthly_finance');
            $table->string('is_has_hki');
            $table->string('is_funded');
            $table->timestamps();

            $table->foreign('umkm_id')->references('id')->on('umkm')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkm_biodatas');
    }
}
