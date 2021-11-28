<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('point')->default(0);
            $table->bigInteger('saldo_refund')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /*

        User::create([
        'name'=>'Tan, Daniel',
        'email'=>'tan.d20@mhs.istts.ac.id',
        'password'=>bcrypt('kekw')
        ])

    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
