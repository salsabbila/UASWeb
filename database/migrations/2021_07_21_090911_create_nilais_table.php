<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_matkul');
            $table->string('nim');
            $table->string('semester');
            $table->integer('kelas')->default(7);
            $table->float('h1')->unsigned()->nullable();
            $table->float('h2')->unsigned()->nullable();
            $table->float('h3')->unsigned()->nullable();
            $table->float('h4')->unsigned()->nullable();
            $table->float('h5')->unsigned()->nullable();
            $table->float('h6')->unsigned()->nullable();
            $table->float('h7')->unsigned()->nullable();
            $table->float('h8')->unsigned()->nullable();
            $table->float('hph')->unsigned()->nullable();
            $table->float('hpts')->unsigned()->nullable();
            $table->float('hpas')->unsigned()->nullable();
            $table->float('hpa')->unsigned()->nullable();
            $table->string('predikat')->nullable();
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
        Schema::dropIfExists('nilais');
    }
}
