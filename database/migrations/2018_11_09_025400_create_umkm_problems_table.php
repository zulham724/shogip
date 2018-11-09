<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmkmProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm_problems', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('problem_list_id')->unsigned();
            $table->integer('umkm_id')->unsigned();
            $table->text('description')->default('-');
            $table->timestamps();

            $table->foreign('problem_list_id')->references('id')->on('problem_lists')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('umkm_problems');
    }
}
