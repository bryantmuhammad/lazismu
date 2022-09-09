<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id_pengeluaran');
            $table->string('id_pemasukan', 10);
            $table->string('nama_pengeluaran', 40);
            $table->timestamps();
        });

        Schema::table('pengeluarans', function (Blueprint $table) {
            $table->foreign('id_pemasukan')->references('id_pemasukan')->on('pemasukans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
}
