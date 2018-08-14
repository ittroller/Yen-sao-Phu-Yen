<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaivietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude');
            $table->string('anhdaidien')->nullable();
            $table->string('alias');
            $table->text('noidung');
            $table->double('luotxem')->default(0);
            $table->integer('loaibv_id')->unsigned();
            $table->foreign('loaibv_id')->references('id')->on('loaibaiviets')->onDelete('cascade');
            $table->integer('tacgia_id')->unsigned();
            $table->foreign('tacgia_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('baiviets');
    }
}
