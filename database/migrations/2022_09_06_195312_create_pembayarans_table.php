<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id_pembayarans');
            $table->string('id_pemasukan', 10);
            $table->string('jenis_pembayaran');
            $table->string('va_number', 100);
            $table->string('jenis_bank', 5);
            $table->string('pdf', 100);
            $table->timestamps();
        });

        Schema::table('pembayarans', function (Blueprint $table) {
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
        Schema::dropIfExists('pembayarans');
    }
}
