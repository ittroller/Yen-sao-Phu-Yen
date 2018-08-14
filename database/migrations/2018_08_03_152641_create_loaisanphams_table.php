<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaisanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanphams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenloai')->unique();
            $table->string('alias');
            $table->integer('loai_con'); //menu đa cấp
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
        Schema::dropIfExists('loaisanphams');
    }
}
