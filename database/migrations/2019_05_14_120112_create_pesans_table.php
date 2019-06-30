<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('pesans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedbigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('tgl_pesan');
            $table->unsignedbigInteger('jam_id');
            $table->foreign('jam_id')->references('id')->on('jams');
            $table->string('deskripsi_pesan', 250)->nullable();
            $table->string('bukti_pembayaran', 250)->nullable();
            $table->enum('status', ['Belum Dibayar', 'Belum Dikonfirmasi',
                        'Dikonfirmasi', 'Sedang Dikerjakan', 'Selesai', 'Batal'])->default('Belum Dibayar');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesans');
    }
}
