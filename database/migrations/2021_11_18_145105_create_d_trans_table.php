<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_trans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_trans');
            $table->unsignedBigInteger('id_buku');
            $table->bigInteger('harga');
            $table->bigInteger('qty');
            $table->bigInteger('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_trans');
    }
}
