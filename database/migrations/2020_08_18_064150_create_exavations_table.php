<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExavationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exavations', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_company');
            $table->String('company');
            $table->String('jenis');
            $table->String('hasil');
            $table->String('lokasi');
            $table->float('jumlah');
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
        Schema::dropIfExists('exavations');
    }
}
