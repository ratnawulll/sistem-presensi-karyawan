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
        Schema::create('karyawan_peraturan', function (Blueprint $table) {
            $table->bigInteger('karyawan_id_Karyawan')->unsigned();
            $table->integer('peraturan_id_Peraturan')->unsigned();

            $table->primary(['karyawan_id_Karyawan', 'peraturan_id_Peraturan']);
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
