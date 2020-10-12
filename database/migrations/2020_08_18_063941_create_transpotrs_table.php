<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranspotrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transpotrs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_company');
            $table->String('company');
            $table->String('jenis');
            $table->String('lokasi');
            $table->float('jumlah');
            $table->float('jarak');
            $table->date('date');
            $table->float('biaya');
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
        Schema::dropIfExists('transpotrs');
    }
}
