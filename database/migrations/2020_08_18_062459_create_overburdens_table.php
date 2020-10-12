<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverburdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overburdens', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_company');
            $table->String('company');
            $table->String('jenis');
            $table->float('bcm');
            $table->String('lokasi');
            $table->float('biaya');
            $table->date('date');
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
        Schema::dropIfExists('overburdens');
    }
}
