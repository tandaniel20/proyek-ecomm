<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_retur', function (Blueprint $table) {
            $table->id();
            $table->string('kode_retur',5)->nullable(true);
            $table->string('id_pemesanan_lama',5)->nullable(true);
            $table->string('id_pemesanan_baru',5)->nullable(true);
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_alamat');
            $table->bigInteger('total')->default(0);
            $table->bigInteger('metode')->default(1);   // 0 transfer, 1 point
            $table->bigInteger('status');               // 0 menunggu respons admin // 1 menunggu resend admin // 2 resent // 3 dikembalikan dalam bentuk point
                                                        // 99 rejected
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
        Schema::dropIfExists('h_retur');
    }
}
