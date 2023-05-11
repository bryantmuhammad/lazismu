<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->string('id_pemasukan', 10)->primary();
            $table->foreignId('id_program')->references('id_program')->on('programs')->onDelete('cascade');
            $table->string('nama_donatur', 50);
            $table->string('catatan', 200)->nullable();
            $table->double('jumlah_pemasukan');
            $table->string('email', 30);
            $table->smallInteger('status');
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
        Schema::dropIfExists('pemasukans');
    }
}
