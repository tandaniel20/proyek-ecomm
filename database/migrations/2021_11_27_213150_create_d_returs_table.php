<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_retur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_retur');
            $table->unsignedBigInteger('id_buku');
            $table->bigInteger('harga')->default(0);
            $table->bigInteger('qty');
            $table->bigInteger('subtotal')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_retur');
    }
}
