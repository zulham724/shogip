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
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('umkm_id')->unsigned();
            $table->string('founder');
            $table->string('identity_number')->nullable();
            $table->string('education')->nullable();
            $table->string('year')->nullable();
            $table->integer('total_employes')->nullable();
            $table->bigInteger('monthly_finance')->nullable();
            $table->integer('asset')->nullable();
            $table->integer('product_capacity')->nullable();
            $table->string('in_the_city')->nullable();
            $table->string('regional')->nullable();
            $table->string('national')->nullable();
            $table->string('international')->nullable();
            $table->integer('capital')->nullable();
            $table->string('bank')->nullable();
            $table->integer('ammount_of_capital')->nullable();
            $table->integer('credit_term')->nullable();
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
