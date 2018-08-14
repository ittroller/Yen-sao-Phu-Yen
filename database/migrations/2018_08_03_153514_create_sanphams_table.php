<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp')->unique();
            $table->string('alias');
            $table->integer('soluong');
            $table->double('gia');
            $table->double('phantramgiamgia')->defaul(0);
            $table->double('giachot');
            $table->string('anhsp');
            $table->string('mota');

            $table->integer('loaisp_id')->unsigned();
            $table->foreign('loaisp_id')->references('id')->on('loaisanphams')->onDelete('cascade');

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
        Schema::dropIfExists('sanphams');
    }
}
