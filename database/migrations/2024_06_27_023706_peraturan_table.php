<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peraturan', function (Blueprint $table) {
            $table->id('id_Peraturan');
            $table->string('nama');
            $table->string('description', 500)->nullable();
            $table->time('jam_masuk'); // mulai absen masuk
            $table->time('batas_jam_masuk'); // akhir absen masuk
            $table->time('jam_pulang'); // mulai absen pulang
            $table->time('batas_jam_pulang'); // akhir absen pulang
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
        //
    }
};
