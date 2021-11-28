<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->bigInteger('harga');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tahun');
            $table->string('bahasa');
            $table->bigInteger('berat');
            $table->string('dimensi');
            $table->string('cover');
            $table->text('deskripsi');
            $table->integer('stock')->default(25);
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
        Schema::dropIfExists('buku');
    }
}
