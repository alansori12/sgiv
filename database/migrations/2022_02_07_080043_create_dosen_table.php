<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nidn',10)->unique();
            $table->string('nm_dsn',50);
            $table->string('jk',9);
            $table->string('email')->unique();
            $table->string('jab_fungs',30)->nullable();
            $table->string('pend',30);
            $table->string('password');
            $table->string('kd_login',1);
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
        Schema::dropIfExists('dosen');
    }
}
